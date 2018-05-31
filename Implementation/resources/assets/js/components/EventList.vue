<script>
    import axios from 'axios';
    import { truncate } from 'lodash';
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
            console.log(truncate);
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
                const {data} = await axios.get('https://gateway.marvel.com:443/v1/public/events', {
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
                    orderBy: '-startDate'
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
            },

            truncate: truncate,

            getDynamicStyle() {
                let style = '';

                const rows = (this.items.length / 2);
                let counter = this.items.length - rows + 2;

                for (let i = 1; i <= rows; i++) {
                    style = style + `
                    .timeline-card:nth-child(${i * 2 - 1}) {
                        order: ${i};
                    }

                    .timeline-card:nth-child(${i * 2}) {
                        order: ${counter};
                    }`;

                    counter++;
                }

                return `<style>${style}</style>`
            }
        }
    }
</script>
