<template>
    <header>
        <div class="container">
            <div class="links">
                <div class="">
                    <ul>
                        <li class="relative">
                            <a href="#"><i class="fa-solid fa-map"></i></a>
                        </li>
                        <li class="relative">
                            <a href="#"
                                ><i class="fa-solid fa-share-nodes"></i
                            ></a>
                        </li>
                        <li><i class="fa-solid fa-book-open" id="book"></i></li>
                    </ul>
                </div>

                <h1>{{ title }}</h1>
            </div>

            <div>
                <img src="/images/logo.png" alt="logo" />
            </div>
        </div>
    </header>
</template>

<script>
export default {
    data() {
        return {
            title: "Browse by Title",
        };
    },
};
</script>
