<!-- Main Content -->
<main class="container">

    <!-- News Section -->
    <section id="news" class="news-grid">
        <?php foreach(get_posts() as $key=>$post): ?>
        <article class="news-article">
            <h2><?= $post['title'];?></h2>
            <img src="https://via.placeholder.com/800x400" alt="Gambar Berita 1" class="news-image">
            <p><?= substr($post['content'],0,100); ?> ...</p>
            <a href="?mod=blog_detail&id=1">Read more</a>
        </article>
        <?php endforeach;?>
    </section>

</main>