<div id="success_message" classe="alert alert_success" style="display:none"></div>

<form id="enquire" action="">

    <h2> Ger asuter ghef <?php the_title(); ?> </h2>

    <input type="hidden" name="registration" value="<?php the_title('registration'); ?>">

    <div class="form-group row">
        <div class="col-lg-6">
            <label>Isem avavat</label>
            <input type="text" name="fname" placeholder="First name" class="form-control" required>
        </div>
        <div class="col-lg-6">
            <label>Isem ik</label>
            <input type="text" name="lname" placeholder="Last name" class="form-control" required>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-6">
            <label>Email</label>
            <input type="email" name="email" placeholder="Email adress" class="form-control" required>
        </div>
        <div class="col-lg-6">
            <label>Phone</label>
            <input type="tel" name="phone" placeholder="Telephone" class="form-control" required>
        </div>
    </div>

    <div class="form-group">
        <label>Dacu i tesrit-</label>
        <textarea name="enquiry" placeholder="Your enquiry" class="form-control" required></textarea>
    </div>

    <div class="form-group">
        <input type="submit" value="Ceyyaa asuter inek" class="btn btn-success btn_block"></button>
    </div>
</form>

<script>
    (function($) {

        $('#enquire').submit(function(event) {

            event.preventDefault();

            var endpoint = '<?php echo admin_url('admin-ajax.php'); ?>';

            var form = $('#enquire').serialize();

            var formdata = new FormData;

            formdata.append('action', 'enquire');
            formdata.append('nonce', '<?php echo wp_create_nonce('ajax_nonce'); ?>); // Protects from Spams
            formdata.append('enquire', form);

            $.ajax(endpoint, {
                type: 'POST',
                data: formdata,
                processData: false,
                contentType: false,

                success: function(res) {
                    $('#enquire').fadeOut(200);
                    $("#success_message").text("Thanemirt ghef usuter nwen (::)").show();
                    $('#enquire').trigger('reset');
                    $('#enquire').fadeIn(800);
                },

                error: function(err)
                {
                    alert(err.responseJSON.data);
                }
            })
        })
    })(jQuery);
</script>