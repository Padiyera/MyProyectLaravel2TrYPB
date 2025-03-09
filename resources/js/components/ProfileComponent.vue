<template>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Profile</h1>
        <form @submit.prevent="updateProfile" class="table-responsive">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th scope="row"><label for="name">Name:</label></th>
                        <td>
                            <input type="text" v-model="form.name" id="name" class="form-control">
                            <div v-if="errors.name" class="text-danger">{{ errors.name }}</div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="email">Email:</label></th>
                        <td>
                            <input type="email" v-model="form.email" id="email" class="form-control">
                            <div v-if="errors.email" class="text-danger">{{ errors.email }}</div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary mt-3 w-100">Update Profile</button>
        </form>
        <p v-if="status" class="mt-3 alert" :class="statusClass">{{ status }}</p>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            form: {
                name: '',
                email: ''
            },
            originalForm: {
                name: '',
                email: ''
            },
            errors: {},
            status: '',
            statusClass: ''
        };
    },
    methods: {
        async updateProfile() {
            this.errors = {}; // Reset errors
            if (!this.validateForm()) {
                return;
            }
            if (this.form.name === this.originalForm.name && this.form.email === this.originalForm.email) {
                this.status = 'No changes detected.';
                this.statusClass = 'alert-warning';
                return;
            }
            try {
                const response = await axios.patch('/profile', this.form);
                if (response.status === 200) {
                    this.status = 'Profile updated successfully!';
                    this.statusClass = 'alert-success';
                    this.originalForm = { ...this.form }; // Update original form values
                } else {
                    this.status = 'Failed to update profile.';
                    this.statusClass = 'alert-danger';
                }
            } catch (error) {
                window.location.reload();
                if (error.response && error.response.data.errors) {
                    this.errors = error.response.data.errors;
                }
            }
        },
        validateForm() {
            let valid = true;
            if (!this.form.name) {
                this.errors.name = 'Name is required.';
                valid = false;
            }
            if (!this.form.email) {
                this.errors.email = 'Email is required.';
                valid = false;
            } else if (!this.validEmail(this.form.email)) {
                this.errors.email = 'Email is not valid.';
                valid = false;
            }
            return valid;
        },
        validEmail(email) {
            const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@(([^<>()[\]\.,;:\s@"]+\.)+[^<>()[\]\.,;:\s@"]{2,})$/i;
            return re.test(email);
        },
        async loadProfile() {
            try {
                const response = await axios.get('/profile/show');
                this.form = response.data.user;
                this.originalForm = { ...response.data.user }; // Store original form values
            } catch (error) {
                this.status = 'Failed to load profile data.';
                this.statusClass = 'alert-danger';
            }
        }
    },
    async mounted() {
        this.loadProfile();
    }
};
</script>

<style scoped>
.container {
    max-width: 600px;
    margin: auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
.table th, .table td {
    vertical-align: middle;
}
.alert {
    padding: 10px;
    border-radius: 5px;
}
.alert-success {
    background-color: #d4edda;
    color: #155724;
}
.alert-danger {
    background-color: #f8d7da;
    color: #721c24;
}
.alert-warning {
    background-color: #fff3cd;
    color: #856404;
}
.text-danger {
    color: #dc3545;
}
</style>