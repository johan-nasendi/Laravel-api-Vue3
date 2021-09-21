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
                      Update Member
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="update()">
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
                                <label for="" class="form-label"> E-mail </label>
                                <input type="email" class="form-control" v-model="transaction.email" >
                                <div v-if="validation.email" class="text-danger">
                                    {{ validation.email[0] }}
                                 </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label"> Description </label>
                                <textarea  class="form-control" rows="5" v-model="transaction.desc"></textarea>
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
                               Save
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
   </div>
</template>


<script>
    import {reactive, ref, onMounted} from 'vue'
    import { useRouter, useRoute} from 'vue-router'
    import axios from 'axios'

    export default{
        setup() {
            let transaction = reactive({
                name: '',
                job: '',
                email: '',
                desc: '',
            });

            const validation =ref([]);

            const router = useRouter();
            const route = useRoute();

            onMounted(() =>{

                axios.get(`http://127.0.0.1:8000/api/transaction/${route.params.id}`)
                .then((result) => {
                   transaction.name = result.data.data.name
                   transaction.job = result.data.data.job
                   transaction.email = result.data.data.email
                   transaction.desc = result.data.data.desc

                }).catch((err) => {
                    console.log(err.response.data)
                });

            });

            function update(){
                axios.put(
                    `http://127.0.0.1:8000/api/transaction/${route.params.id}`,
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
                update
            }
        }
    }
</script>
