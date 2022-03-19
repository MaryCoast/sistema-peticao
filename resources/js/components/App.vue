<template>
<v-app>
  <v-app-bar color="primary" dark app>
      <v-app-bar-title>Henrique T.</v-app-bar-title>
      <v-spacer></v-spacer>
      <v-btn :href="logout" color="secondary">Sair</v-btn>
  </v-app-bar>

  <!-- Sizes your content based upon application components -->
  <v-main>

    <!-- Provides the application the proper gutter -->
    <v-container fluid>
        <slot></slot>
    </v-container>
  </v-main>

  <v-footer app>
    <!-- -->
  </v-footer>
</v-app>
</template>

<script>
export default {
  data(){
    return{
    logout: `${window.location.origin}/logout`,
    }
  }

}
</script>

<style>

</style>