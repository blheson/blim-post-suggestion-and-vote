<?php
// Namespace View\Admin;
// class AdminMain{
//     static function dashboard(){
//         // echo 'thanks';
//         return 'Thank you';
//     }
// }
?>
<style>
    .row2 {
        grid-auto-columns: 48%;
        grid-auto-rows: 201px;
        display: grid;
        width: 100%;
        gap: 4%;
        grid-template-areas: "a a";
    }
    .blim_dashboard_box{
        padding: 1rem;
        background-color: #fff;
        margin-bottom:2rem
    }
    .group_input{
        padding-bottom: 1rem;
    }
    .container{
        padding: 1rem;
    }
</style>
<section class="container">
<div class="blim_dashboard_box">
<h2>Thank you for installing Blim post modifier </h2>
</div>
    <div class="row2">
        <div class="col-md-6 blim_dashboard_box">
            <h2>Toggle</h2>
            <div>
                <form action=<?=get_site_url()."/wp-admin/admin-post.php"?> method="post">
                <input type="hidden" name="action" value="">
                    <div class="group_input">
                        <label for="">
                            <input type="checkbox" name="showsuggestion" value="suggestion">Show Post Suggestion</label>
                    </div>
                    <div class="group_input">
                        <label for="">
                            <input type="checkbox" name="vote" value="suggestion">Vote</label>
                    </div>
                    <div class="group_input">
                   <?php submit_button('update');?>
                    </div>
                </form>

            </div>

        </div>
        <div class="col-md-6 blim_dashboard_box" style="background-color:#fff">
        </div>
    </div>
</section>