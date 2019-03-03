<template>
  <v-list>
    <v-list-tile :to="{ name: 'homepage'}">
      <v-list-tile-action>
        <v-icon>home</v-icon>
      </v-list-tile-action>

      <v-list-tile-content>
        <v-list-tile-title>Home</v-list-tile-title>
      </v-list-tile-content>
    </v-list-tile>

    <v-list-tile :to="{ name: 'user'}">
      <v-list-tile-action>
        <v-icon>account_circle</v-icon>
      </v-list-tile-action>

      <v-list-tile-content>
        <v-list-tile-title>User</v-list-tile-title>
      </v-list-tile-content>
    </v-list-tile>
  </v-list>
</template>

<script>

export default {
  name: "Menu",
  components: {

  },
  data() {
    return {};
  },
  filters: {},
  watch: {},
  methods: {},
  computed: {},
  mounted() {}
};
</script>