Vue.component('primesilos', {
    template: '#primesilos-template',
    data: function () {
        return {
            primesilos: []
        }
    },
    created: function () {
        var resource = this.$resource("api/v1/primesilos/:id");
        this.getPrimesilos();
    },
    methods: {
        getPrimesilos: function() {

            resource.get('api/v1/primesilos').then((response) => {
                this.primesilos = response.body;
                this.primesilos.forEach(function (silo) {
                    silo.capacity = silo.capacity * 100;
                });
            }, (response) => {
                console.log('Error fetching silos');
            });

        },

        delete: function(silo){
            this.primesilos.$remove(silo);
        }
    }
});

new Vue({
    el: '#vue-primesilos'
});