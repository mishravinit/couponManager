<div>
    <h2>Update Terms and Conditions</h2>
    <?php
        echo form_open('configurations/settings/edit_terms','id="terms-form"'); 
        echo form_textarea('content', $content,'id="username"');        
        echo form_submit('submit','Save Content');
    ?>    
    <?php echo form_close(); ?>
</div>