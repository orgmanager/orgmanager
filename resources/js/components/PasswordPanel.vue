<template>
    <div class="bg-white shadow-md rounded-lg p-4">
        <div class="flex items-center justify-between mb-4">
            <p class="text-xl text-grey-darkest">Organization Password</p>
            <p class="text-sm text-grey-darker">If you set a password for this organization, only users who know the password will be able to login.</p>
        </div>
        <form @submit.prevent="submitForm">
            <input v-model="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline" type="password" placeholder="hunter2" required>
            <div class="flex justify-end mt-2">
                <button v-if="shouldShowPasswordRemoval" type="button" class="bg-transparent hover:bg-red-light text-red hover:text-white border border-red font-bold px-3 rounded-full focus:outline-none mr-2" @click="removePassword">Remove password</button>
                <button type="submit" class="bg-grey hover:bg-grey-dark text-white font-bold py-2 px-3 rounded-full focus:outline-none" v-text="shouldShowPasswordRemoval ? 'Update Password':'Set Password'"></button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    props: ['passwordRoute', 'hasPassword'],
    data() {
        return {
            password: null,
            shouldShowPasswordRemoval: this.hasPassword,
        }
    },
    methods: {
        submitForm() {
            import('../lib/axios' /* webpackChunkName: "axios" */).then(module => module.default).then(axios => {
                axios.post(this.passwordRoute, {
                    password: this.password
                }).catch(error => {
                    if (typeof error.response.data === 'object' && error.response.data.exception == undefined) {
                        console.log(error.response.data.errors)
                    } else {
                        window.swal('Oops!', 'Something went wrong. Please reload the page and try again.', 'error')
                    }
                }).then(response => {
                    this.password = null
                    this.shouldShowPasswordRemoval = true

                    window.swal('Password changed', 'The organization password was successfully updated.', 'success')
                })
            })
        },
        removePassword() {
            import('../lib/axios' /* webpackChunkName: "axios" */).then(module => module.default).then(axios => {
                axios.delete(this.passwordRoute).then(response => {
                    this.password = null
                    this.shouldShowPasswordRemoval = false

                    window.swal('Password removed', 'The organization is no longer protected by a password.', 'success')
                }).catch(error => {
                    if (typeof error.response.data === 'object' && error.response.data.exception == undefined) {
                        console.log(error.response.data.errors)
                    } else {
                        window.swal('Oops!', 'Something went wrong. Please reload the page and try again.', 'error')
                    }
                })
            })
        }
    }
}
</script>