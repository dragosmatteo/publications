<template>
    <div class="filters">
        <form @keydown.enter.prevent="updateSearch">
            <div class="search-container">
                <input
                    type="text"
                    placeholder="Search..."
                    name="search"
                    v-model="search"
                    @input="updateSearch"
                />
                <button @click="updateSearch" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </div>

            <div class="options">
                <select v-model="sortBy" @change="sortPublications(sortBy)">
                    <option value="" selected disabled hidden>
                        Sort by...
                    </option>
                    <option value="date">Date</option>
                    <option value="title">Title</option>
                    <option value="author">Author</option>
                    <option value="category">Category</option>
                </select>
                <button class="icon"><i class="fa-solid fa-play"></i></button>
            </div>

            <div class="filter">
                <div class="search-filter">
                    <input type="text" placeholder="Filter By..." disabled />
                </div>
                <ul>
                    <li class="active">Filter by Period</li>
                    <li
                        v-for="categoryOption in categories"
                        :key="categoryOption.key"
                        @click="filterByCategory(categoryOption.category)"
                    >
                        {{ categoryOption.category }}
                    </li>
                </ul>
            </div>
        </form>
    </div>

    <div class="articles">
        <div class="latest">
            <span>Latest Publications</span>
        </div>
        <div class="banner">
            <div class="publication">
                <img src="images/white.png" alt="white" />
                <div class="text">
                    <h1>{{ title }}</h1>
                    <h3>{{ author }}</h3>
                    <p>{{ description }}</p>
                </div>
            </div>
        </div>

        <!-- Post Component -->
        <div class="posts-letter">
            <h1>A</h1>
            <hr />
            <div class="posts">
                <div
                    v-for="post in publications"
                    :key="post.id"
                    @click="send(post)"
                >
                    <div class="post">
                        <img src="images/white.png" alt="post" />
                        <h3>{{ post.title }}</h3>
                        <span>{{ post.author }}</span>
                    </div>
                </div>
            </div>
            <div
                v-if="
                    $refs.publications && Object.keys(publications).length === 0
                "
            >
                <h1>No article to show</h1>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            search: "",
            sortBy: "",
            category: "",
            categories: [],
            publications: [],
            title: "Deonte",
            author: "Kelly",
            description:
                "Quia explicabo ut maxime nemo blanditiis blanditiis aperiam. Neque ex reiciendis ex mollitia ut et similique quaerat. Totam quia quae et fugiat doloremque provident odit.",
        };
    },
    methods: {
        send(post) {
            this.title = post.title;
            this.author = post.author;
            this.description = post.description;
        },
        updateSearch() {
            this.search = this.search;
            this.fetchPublications();
        },
        sortPublications(sortBy) {
            this.sortBy = sortBy;
            this.fetchPublications();
        },
        filterByCategory(category) {
            this.category = category;
            this.fetchPublications();
        },
        fetchPublications() {
            let params = {
                search: this.search,
                "filter[category]": this.category,
                sort: this.sortBy,
            };

            axios
                .get("/publications.json", { params })
                .then((response) => {
                    this.publications = response.data;
                })
                .catch((error) => {
                    console.error(error);
                });

            axios
                .get("/categories.json")
                .then((response) => {
                    this.categories = response.data;
                })
                .catch((error) => {
                    console.error(error);
                });
        },
    },
    mounted() {
        if (this.$route !== undefined) {
            this.search = this.$route.query.search;
            this.category = this.$route.query.filter.category;
            this.sortBy = this.$route.query.sort;
        }
        this.fetchPublications();
    },
    watch: {
        $route() {
            if (this.$route !== undefined) {
                this.search = this.$route.query.search;
                this.category = this.$route.query.filter.category;
                this.sortBy = this.$route.query.sort;
            }
            this.fetchPublications();
        },
    },
    created() {
        this.fetchPublications();
    },
};
</script>
