<div>
    <h2>Update About Content</h2>
    <?php
        echo form_open('configurations/settings/edit_about','id="about-us-form"'); 
        echo form_textarea('content', $content,'id="username"');        
        echo form_submit('submit','Save Content');
    ?>    
    <?php echo form_close(); ?>
</div>