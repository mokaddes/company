<template>
    <div class=" bg-black  ">
        <div class="bg-black p-0  lg:p-8 mb-4 lg:mb-0 rounded-lg shadow-lg w-full ">
            <p class="text-[22px] mb-4">
                {{ formTitle }}
            </p>
            <form @submit.prevent="submitForm" class="space-y-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="firstName" class="block text-white  mb-1">
                            First Name<span class="text-red-500">*</span>
                        </label>
                        <input
                            type="text"
                            id="firstName"
                            v-model="form.firstName"
                            class="w-full p-2 border border-gray-700 rounded-lg bg-gray-100 text-black"
                            placeholder="Enter your first name"
                            required
                        />
                    </div>
                    <div>
                        <label for="lastName" class="block text-white  mb-1">
                            Last Name
                        </label>
                        <input
                            type="text"
                            id="lastName"
                            v-model="form.lastName"
                            class="w-full p-2 border border-gray-700 rounded-lg bg-gray-100 text-black"
                            placeholder="Enter your last name"
                        />
                    </div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="phone" class="block text-white  mb-1">
                        Phone Number
                    </label>
                    <input
                        type="text"
                        id="phone"
                        v-model="form.phone"
                        class="w-full p-2 border border-gray-700 rounded-lg bg-gray-100 text-black"
                        placeholder="Enter your phone number"
                    />
                </div>
                <div>
                    <label for="email" class="block text-white  mb-1">
                        Email Address<span class="text-red-500">*</span>
                    </label>
                    <input
                        type="email"
                        id="email"
                        v-model="form.email"
                        class="w-full p-2 border border-gray-700 rounded-lg bg-gray-100 text-black"
                        placeholder="Enter your work email address"
                        required
                    />
                </div>
                </div>
                <div>
                    <label for="message" class="block text-white  mb-1">
                        Message<span class="text-red-500">*</span>
                    </label>
                    <textarea
                        id="message"
                        v-model="form.message"
                        rows="5"
                        class="w-full p-2 border border-gray-700 rounded-lg bg-gray-100 text-black"
                        placeholder="Enter your message"
                        required
                    ></textarea>
                </div>
                <button
                    type="submit"
                    class="bg-white text-black  p-3 rounded-lg shadow hover:bg-gray-200"
                >
                    Submit
                </button>
            </form>
        </div>
    </div>
</template>

<script>
import toastr from "toastr";
import axios from "axios";
export default {
    name: "ContactForm",
    props: {
        formTitle: {
            type: String,
            required: true,
        },
    },
    data() {
        return {
            form: {
                firstName: "",
                lastName: "",
                phone: "",
                email: "",
                message: "",
            },
        };
    },
    methods: {
        submitForm() {
            console.log(this.form);
            axios.post("/contact/submit", this.form,{
                headers: {
                    "Content-Type": "application/json",
                },
            })
                .then((response) => {
                    console.log(response);
                    toastr.success("Form submitted successfully!");
                    this.form = {
                        firstName: "",
                        lastName: "",
                        phone: "",
                        email: "",
                        message: "",
                    };
                })
                .catch((error) => {
                    console.error(error);
                    toastr.error("Failed to submit the form");
                });
        },
    },
};
</script>

<style scoped>
input:focus {
    outline: none;
}
input{
    height: 50px;
}
</style>
