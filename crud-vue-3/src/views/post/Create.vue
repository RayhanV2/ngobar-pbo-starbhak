<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 rounded shadow">
                    <div class="card-body">
                        <h4>TAMBAH MENU</h4>
                        <hr>

                        <form @submit.prevent="store">
                            <div class="form-group">
                                <label for="nama_menu" class="font-weight-bold">Nama Menu</label>
                                <input type="text" class="form-control" v-model="menu.nama_menu" placeholder="Masukkan Nama Menu">
                                <!-- validation -->
                                <div v-if="validation.nama_menu" class="mt-2 alert alert-danger">
                                    {{ validation.nama_menu[0] }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="harga_menu" class="font-weight-bold">Harga Menu</label>
                                <input type="text" class="form-control" v-model="menu.harga_menu" placeholder="Masukkan Harga Menu">
                                <!-- validation -->
                                <div v-if="validation.harga_menu" class="mt-2 alert alert-danger">
                                    {{ validation.harga_menu[0] }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="jenis" class="font-weight-bold">Jenis</label>
                                <input type="text" class="form-control" v-model="menu.jenis" placeholder="Masukkan Jenis">
                                <!-- validation -->
                                <div v-if="validation.jenis" class="mt-2 alert alert-danger">
                                    {{ validation.jenis[0] }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="stock" class="font-weight-bold">Stock</label>
                                <input type="text" class="form-control" v-model="menu.stock" placeholder="Masukkan Stock">
                                <!-- validation -->
                                <div v-if="validation.stock" class="mt-2 alert alert-danger">
                                    {{ validation.stock[0] }}
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">SIMPAN</button>
                        </form>                        

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { reactive, ref } from 'vue'
import { useRouter } from 'vue-router'
import axios from 'axios'

export default {

    name: 'index',
    setup() {

        //state posts
        const menu = reactive({
            nama_menu: '',
            harga_menu: '',
            jenis: '',
            stock: ''
        })

        //state validation
        const validation = ref([])

        //vue router
        const router = useRouter()

        //method store
        function store() {

            let nama_menu  = menu.nama_menu
            let harga_menu = menu.harga_menu
            let jenis = menu.jenis
            let stock = menu.stock

            axios.post('http://localhost:8000/api/menu', {
                nama_menu: nama_menu,
                harga_menu: harga_menu,
                jenis: jenis,
                stock: stock,

            }).then(() => {

                //redirect ke menu index
                router.push({
                    name: 'menu.index'
                })

            }).catch(error => {
                //assign state validation with error 
                validation.value = error.response.data
            })

        }

        //return
        return {
            menu,
            validation,
            router,
            store
        }

    }

}
</script>

<style>
    body{
        background: lightgray;
    }
</style>