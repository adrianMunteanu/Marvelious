<script>
    import axios from 'axios';
    import $ from 'jquery';

    export default {
        data() {
            return {
                items: [],
                page: 0,
                limit: 20,
                loading: false,
                filters: {
                    name: ''
                }
            }
        },

        mounted() {
            $(window).scroll(() => {
                if ($(window).scrollTop() === $(document).height() - $(window).height() && !this.loading) {
                    this.getItems();
                }
            });

            if (!this.loading) {
                this.getItems();
            }
        },

        methods: {
            async getItems() {
                this.loading = true;
                const {data} = await axios.get('https://gateway.marvel.com:443/v1/public/characters', {
                    params: this.buildParams()
                });

                this.items = this.items.concat(data.data.results);
                this.page++;
                this.loading = false;
            },

            buildParams() {
                const base =  {
                    limit: this.limit,
                    offset: this.limit * this.page,
                    orderBy: '-modified'
                };

                if (this.filters.name) {
                    base['nameStartsWith'] = this.filters.name;
                }

                return base;
            },

            applyFilters() {
                this.page = 0;
                this.items = [];
                this.getItems();
            }
        }
    }
</script>
