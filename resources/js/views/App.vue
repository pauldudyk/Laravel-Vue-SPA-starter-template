<template>
  <v-app >
    <v-navigation-drawer app v-model="drawer" clipped>
        <Menu></Menu>
    </v-navigation-drawer>
    <v-toolbar app clipped-left>
        <v-btn icon  @click.stop="drawer = !drawer">
            <v-icon>menu</v-icon>
        </v-btn>
        <v-spacer></v-spacer>
        {{user.name}}
        <v-toolbar-items>
            <v-btn v-if="!authorisedUser" flat @click="auth()">Login with Facebook</v-btn>
            <v-btn v-if="authorisedUser" flat @click="logout()">Log out</v-btn>
        </v-toolbar-items>
    </v-toolbar>
    <v-content>
      <v-container fluid>
        <router-view></router-view>
      </v-container>
    </v-content>
    <v-footer app class="pa-3">
        <v-spacer></v-spacer>
        <div>All rights reserved &copy; {{ new Date().getFullYear() }}</div>
        </v-footer>
  </v-app>
</template>

<script>

import Menu from '@/js/views/Menu';
import { mapGetters } from 'vuex';

export default {
    components: {
        Menu,
    },
        data() {
            return {
                drawer: true,
            };
        },
        filters: {

        },
        watch: {
            'authorisedUser' : function() {
                this.$router.replace('/')
            }
        },
        methods: {
            auth() {
                window.location = window.location.origin + '/auth/facebook/redirect'
            },
            logout() {
                 this.$store.dispatch('logoutUser', localStorage.getItem('accessToken'));
            }
        },
        computed: {
            ...mapGetters({
                    user: 'userData',
                    authorisedUser: 'authorisedUser'
            })
        },

        mounted() {
            if(!this.authorisedUser && this.$route.query.code !== undefined && localStorage.getItem('accessToken') === null) {
                this.$store.dispatch('loadUserData', this.$route.query.code);
            } else if(!this.authorisedUser && this.$route.query.code === undefined && localStorage.getItem('accessToken') !== null) {
                this.$store.dispatch('loadUserData', localStorage.getItem('accessToken'));
            }
        }
    };
</script>