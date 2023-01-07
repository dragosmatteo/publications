<template>
    <footer>
        <div class="footer-nav">
            <ul>
                <li class="up" @click="scrollToTop()">
                    <i class="fa-sharp fa-solid fa-arrow-up"></i>
                </li>
                <li class="link solid link-1"><a href="#">Knowledge Hub</a></li>
                <li class="link"><a href="#">- Home </a></li>
                <li class="link"><a href="#">- Help </a></li>

                <li class="link solid link-2">
                    <a href="#">Oxford Archaeology</a>
                </li>
                <li class="link"><a href="#">- Website </a></li>
                <li class="link"><a href="#">- Contact </a></li>
            </ul>
        </div>

        <div class="image">
            <img src="images/logo.png" alt="logo" />
        </div>
    </footer>
</template>

<script>
export default {
    methods: {
        scrollToTop() {
            window.scrollTo({ top: 0, behavior: "smooth" });
        },
    },
};
</script>
