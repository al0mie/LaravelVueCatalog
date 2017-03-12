<template>
    <div class="panel panel-default" v-cloak>
        <div class="panel-body">
            <legend>Create Student</legend>

            <crud-form :student="student"></crud-form>

            <back-button> </back-button>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                url: '/api/students',
                student: {
                    avatar: '',
                    name: '',
                    email: '',
                    birth_date: '',
                }
            }
        },
        events: {
            'submitted'(student) {
                this.submit(student);
            }
        },
        methods: {
            submit(formData) {
                this.$http.post(this.url, formData)
                    .then(response => {
                        let alert = {
                            show: true,
                            type: 'success',
                            title: 'Success',
                            message: 'Student successfully created.'
                        };

                        this.$broadcast('showAlert', alert);

                        this.resetForm();
                    }).catch(response => {
                        let errors = response.body;

                        this.$broadcast('formErrors', errors);
                    });
            },
            resetForm() {
                this.student = {
                    avatar: '',
                    name: '',
                    email: '',
                    birth_date: '',
                }
            }
        }
    }
</script>
