<template>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-8">
                <router-link :to="{name: 'transaction.index'}"
                class="btn btn-primary btn-sm rounded shadow mb-3" >
                   Back
                </router-link>

                <div class="card rounded shadow">
                    <div class="card-header">
                       Create Transaction
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="store()">
                            <div class="mb-3">
                                <label for="" class="form-label"> Name </label>
                                <input type="text" class="form-control" v-model="transaction.name">
                                <div v-if="validation.name" class="text-danger">
                                   {{ validation.name[0] }}
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label"> Job </label>
                                <input type="text" class="form-control" v-model="transaction.job">
                                <div v-if="validation.job" class="text-danger">
                                    {{ validation.job[0] }}
                                 </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label"> Email </label>
                                <input type="email" class="form-control" v-model="transaction.email" placeholder="">
                                <div v-if="validation.email" class="text-danger">
                                    {{ validation.email[0] }}
                                 </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label"> Description </label>
                                <textarea class="form-control" cols="5" rows="5" v-model="transaction.desc" ></textarea>
                                <div v-if="validation.desc" class="text-danger">
                                    {{ validation.desc[0] }}
                                 </div>
                            </div>

                            <!-- <div class="mb-3">
                                <label for="" class="form-label"> Type </label>
                                <select class="form-select" id="" v-model="transaction.type">
                                    <option value="expense">Expense</option>
                                    <option value="revenue">Revenue</option>
                                </select>
                                <div v-if="validation.type" class="text-danger">
                                    {{ validation.type[0] }}
                                 </div>
                            </div> -->

                            <button class="btn btn-outline-primary">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
   </div>
</template>


<script>
    import {reactive, ref} from 'vue'
    import { useRouter} from 'vue-router'
    import axios from 'axios'

    export default{
        setup() {
            const transaction = reactive({
                name: '',
                job: '',
                email: '',
                desc: '',
            });

            const validation =ref([]);

            const router = useRouter();

            function store(){
                axios.post(
                    'http://127.0.0.1:8000/api/transaction',
                     transaction
                )
                .then((result) => {
                    router.push({
                        name: 'transaction.index'
                    });

                }).catch((err) => {
                    validation.value = err.response.data
                });
            }
            return {
                transaction,
                validation,
                router,
                store
            }
        }
    }
</script>
