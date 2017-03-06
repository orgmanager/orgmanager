// Auto-respond to new issues and pull requests
on('issues.opened', 'pull_request.opened')
  .comment('Thanks for your contribution @{{ user.login }}! We'll try to reply as soon as we can. Meanwhile, [join the OrgManager Organization if you haven\'t!][joinorg]
  
  [config]: https://orgmanager.miguelpiedrafita.com/o/orgmanager');
