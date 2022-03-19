<template>
  <div>
      <v-card>
              <v-card-title>Petição</v-card-title>
              
              <v-card-text>
                  <v-row>
                      <v-col cols="12" md="6">
                        <v-text-field dense outlined rounded
                        label="Titulo"
                        v-model="peticao.titulo"
                        :error-messages="erros.titulo"
                        >
                        </v-text-field>
                      </v-col>  
                      <v-col cols="12" md="6">
                        <v-text-field dense outlined rounded
                        label="Destinatário"
                        v-model="peticao.destinatario"
                        :error-messages="erros.destinatario"
                        >
                        </v-text-field>
                      </v-col>
                      <v-col cols="12" md="12">
                        <v-textarea dense outlined rounded
                        label="Descrição"
                        v-model="peticao.descricao"
                        :error-messages="erros.descricao"
                        >
                        </v-textarea>
                      </v-col>
                  </v-row>
                  <v-row>
                  <v-col  class="text-right py-0">
                  <v-btn color="primary" @click="salvar">Salvar</v-btn>
                  <v-btn color="primary" @click="listar">Pesquisar</v-btn>
                  <v-btn color="primary" @click="limpar">Cancelar</v-btn>
                  </v-col>
              </v-row>
              </v-card-text>            

              <v-card-text>
                  <v-simple-table>
                      <thead>
                          <tr>
                            <th>Id</th>
                            <th>Titulo</th>
                            <th>Destinatário</th>
                            <th>Ação</th>
                          </tr>
                      </thead>
                      <tbody>

                          <tr v-for="peticao,index in peticoes" :key="peticao.id" :class="{'accent':index%2==0}">
                            <td>{{peticao.id}}</td>
                            <td>{{peticao.titulo}}</td>
                            <td>{{peticao.destinatario}}</td>
                            <td>
                              <v-btn icon><v-icon @click="selecionar(peticao)">mdi-archive-edit-outline</v-icon></v-btn>
                              <v-btn icon><v-icon @click="deletar(peticao.id)">mdi-delete-forever</v-icon></v-btn>
                            </td>
                          </tr>
                      </tbody>
                  </v-simple-table>
              </v-card-text>
      </v-card>

  </div>
</template>

<script>

import Peticao from './Peticao'
import axios from 'axios';
import Swal from 'sweetalert2';

export default {
    data(){
        return{
            peticao: new Peticao(),
            peticoes: [],
            base_url: window.location.origin,
            erros:{}
        }
    },
    created(){
        this.listar()
    },
    methods:{
        limpar(){
            this.peticao = new Peticao();
            this.erros = {};
            this.listar();
        },
        salvar(){
            if(this.peticao.id){          
                axios.put(`${this.base_url}/peticao/update`,this.peticao)
                    .then(res => {
                        Swal.fire("Alterado com sucesso",'','success');
                        this.limpar();
                    })
                    .catch(erro =>{
                        console.error(erro.response)
                        this.erros = erro.response.data.errors;
                    })
            }else{
                axios.post(`${this.base_url}/peticao/create`,this.peticao)
                    .then(res => {
                        Swal.fire("Inserido com sucesso",'','success');
                        this.limpar();
                    })
                    .catch(erro =>{
                        console.error(erro.response)
                        this.erros = erro.response.data.errors;
                    })
            }
        },
        listar(){
            let params = this.peticao
            axios.get(`${this.base_url}/peticao/list`,{params})
                .then(res => {
                    console.log(res)
                    this.peticoes = res.data;
                });
        },
        selecionar(dado){
            this.peticao = JSON.parse(JSON.stringify(dado));
        },
        deletar(id){
            let params = {id}
            axios.delete(`${this.base_url}/peticao/delete`,{params})
                .then(res => {
                    this.listar();
                });
        },
    }
}
</script>

<style>

</style>