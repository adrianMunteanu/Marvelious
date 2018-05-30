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
                    title: ''
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
                const {data} = await axios.get('https://gateway.marvel.com:443/v1/public/comics', {
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
                    hasDigitalIssue: true
                };

                if (this.filters.title) {
                    base['titleStartsWith'] = this.filters.title;
                }

                return base;
            },

            applyFilters() {
                this.items = [];
                this.getItems();
            },

            getCharacters(item) {
                return item.characters.items.slice(0, 2).map(e => e.name).join(', ');
            }
        }
    }
</script>