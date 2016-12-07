Vue.component('silo-component', {
    template: '#silocomponent-template',
    props: ["siloC"],
    methods: {
        update: function(silo){
            console.log(silo);
            axios.put('/api/v1/primesilos/' + silo.id , {
                    silo: silo.id,
                    capacity: silo.capacity
                })
                .then(function (response) {
                    console.log(silo);
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    }
});


new Vue({
    el: '#vue-primesilos',
    data: function () {
        return {
            primesilos: [],
        };
    },
    created: function () {
        //var resource = this.$resource("api/v1/primesilos/:id");
        this.getPrimesilos();
    },
    methods: {
        getPrimesilos: function () {
            axios.get('/api/v1/primesilos')
                .then(function (response) {
                    var silos = response.data;
                    silos.forEach(function (silo) {
                        silo.capacity = silo.capacity * 100;
                    });
                    this.primesilos = silos;
                }.bind(this))
                .catch(function (error) {
                    console.log(error);
                });
        }
    }
});
