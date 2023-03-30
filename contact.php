<?php
/*
Template Name: Page de Contact
*/
?>

<?php get_header(); ?>

<style>
    .banner {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 200px;
        background-color: #f1f1f1;
        overflow: hidden;
    }

    .banner img {
        max-width: none;
        max-height: none;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>

<main class="container mt-5">

    <div class="banner">
        <img src="https://i.imgur.com/vS4F50J.png" alt="Bannière">
    </div>

    <div class="row justify-content-center mt-4">
        <div class="col-md-6">

            <h1><?php echo get_theme_mod('contact_title', 'Contactez-nous'); ?></h1>
            <p><?php echo get_theme_mod('contact_description', 'Remplissez le formulaire ci-dessous pour nous envoyer un message.'); ?></p>

            <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
                <input type="hidden" name="action" value="custom_contact_form">
                <?php wp_nonce_field('custom_contact_form_nonce', 'custom_contact_form_nonce'); ?>

                <div class="form-group">
                    <label for="name"><?php echo get_theme_mod('contact_name_label', 'Nom complet'); ?></label>
                    <input type="text" name="name" class="form-control" id="name" required>
                </div>

                <div class="form-group">
                    <label for="email"><?php echo get_theme_mod('contact_email_label', 'Adresse email'); ?></label>
                    <input type="email" name="email" class="form-control" id="email" required>
                </div>

                <div class="form-group">
                    <label for="phone"><?php echo get_theme_mod('contact_phone_label', 'Téléphone'); ?></label>
                    <input type="tel" name="phone" class="form-control" id="phone" required>
                </div>

                <div class="form-group">
                    <label for="subject"><?php echo get_theme_mod('contact_subject_label', 'Sujet'); ?></label>
                    <input type="text" name="subject" class="form-control" id="subject" required>
                </div>

                <div class="form-group">
                    <label for="message"><?php echo get_theme_mod('contact_message_label', 'Message'); ?></label>
                    <textarea name="message" class="form-control" id="message" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary"><?php echo get_theme_mod('contact_submit_label', 'Envoyer'); ?></button>
            </form>

        </div>
    </div>

</main>

<?php get_footer(); ?>