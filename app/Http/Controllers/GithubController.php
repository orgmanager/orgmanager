<?php

namespace App\Http\Controllers;

use App\Notification;
use App\Repo;
use Auth;
use GrahamCampbell\GitHub\Facades\GitHub;

class GithubController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getNotifications()
    {
        Github::authenticate(Auth::user()->token, null, 'http_token');
        $notifications = GitHub::api('notification')->all();
        $this->storeNotifications($notifications);
        $this->storeRepos($notifications);

        return redirect('notifications');
    }

    public function getNotification($id)
    {
        Github::authenticate(Auth::user()->token, null, 'http_token');
        $notification = GitHub::api('notification')->id($id);
        $type = ($notification['subject'])['type'];
        $url = ($notification['subject'])['url'];
        $processed_url = explode('/', $url);
        $user = $processed_url[4];
        $repo = $processed_url[5];
        $id = $processed_url[7];
        if ($type == 'PullRequest') {
            $pullRequest = $this->getPR($user, $repo, $id);

            return redirect($pullRequest['html_url']);
        } elseif ($type == 'Issue') {
            $issue = $this->getIssue($user, $repo, $id);

            return redirect($issue['html_url']);
        } elseif ($type == 'Commit') {
            $commit = $this->getCommit($user, $repo, $id);

            return redirect($commit['html_url']);
        } elseif ($type == 'Release') {
            $release = $this->getRelease($user, $repo, $id);

            return redirect($release['html_url']);
        } else {
            return redirect('wip');
        }
    }

    public function getIssue($user, $repo, $id)
    {
        Github::authenticate(Auth::user()->token, null, 'http_token');
        $issue = Github::api('issue')->show($user, $repo, $id);

        return $issue;
    }

    public function getPR($user, $repo, $id)
    {
        Github::authenticate(Auth::user()->token, null, 'http_token');
        $pullRequest = Github::api('pull_request')->show($user, $repo, $id);

        return $pullRequest;
    }

    public function getCommit($user, $repo, $id)
    {
        Github::authenticate(Auth::user()->token, null, 'http_token');
        $commit = Github::api('repo')->commits()->show($user, $repo, $id);

        return $commit;
    }

    public function getRelease($user, $repo, $id)
    {
        Github::authenticate(Auth::user()->token, null, 'http_token');
        $release = Github::api('repo')->releases()->show($user, $repo, $id);

        return $release;
    }

    public function storeNotifications($notifications)
    {
        foreach ($notifications as $rawnotif) {
            if (!Notification::where('id', '=', $rawnotif['id'])->exists()) {
                $subject = $rawnotif['subject'];
                $repo = $rawnotif['repository'];
                $notification = new Notification();
                $notification->id = $rawnotif['id'];
                $notification->unread = $rawnotif['unread'];
                $notification->reason = $rawnotif['reason'];
                $notification->title = $subject['title'];
                $notification->url = $subject['url'];
                $notification->type = $subject['type'];
                $notification->private = $repo['private'];
                $notification->repoid = $repo['id'];
                $notification->userid = Auth::user()->id;
                $notification->save();
            }
        }
    }

    public function storeRepos($notifications)
    {
        foreach ($notifications as $notification) {
            $repo = $notification['repository'];
            if (!Repo::where('id', '=', $repo['id'])->exists()) {
                $user = $repo['owner'];
                if (Repo::find($repo['id']) == null) {
                    $repository = new Repo();
                    $repository->id = $repo['id'];
                    $repository->name = $repo['name'];
                    $repository->full_name = $repo['full_name'];
                    $repository->owner = $user['login'];
                    $repository->html_url = $repo['html_url'];
                    $repository->description = $repo['description'];
                    $repository->userid = Auth::user()->id;
                    $repository->save();
                }
            }
        }
    }
}
