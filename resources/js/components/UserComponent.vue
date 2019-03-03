<template>
    <div>
        <h3>{{user.name}}</h3>
        <h4>{{user.email}}</h4>
    </div>
</template>
<script>
import { mapGetters } from 'vuex';

export default {
  name: "UserComponent",
  components: {

  },
  data() {
    return {

    };
  },
  filters: {

  },
  watch: {

  },
  methods: {

  },
    computed: {
        ...mapGetters({
                user: 'userData',
        })
    },
  mounted() {

  }
};
</script>