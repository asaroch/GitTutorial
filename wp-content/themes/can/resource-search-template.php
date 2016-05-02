<?php 
// Fetch Business types to populate filter business type drop down
$business_types = get_terms('business-type', array(
    'parent' => '0',
    'hide_empty' => 0
        ));
?>
<section id="search_resource"><!-- Search Resource -->
    <div class="container">
        <form method="get" action="<?php echo get_the_permalink('597'); ?>" id="resource-search">
            <div class="row"> 
                <div class="col-sm-5 col-md-6">
                    <div class="form-group"> 
                        <fieldset>
                            <input type="text" class="form-control" placeholder="Search" value="<?php echo $_GET['keyword']; ?>" name="keyword" id="search-keyword" />
                        </fieldset>
                    </div>
                </div>
                <?php
                if (!empty($business_types)) {
                    ?>
                    <div class="col-sm-1 option-text hidden-xs">
                        <p>and / or</p>
                    </div>
                    <div class="col-sm-3 hidden-xs">
                        <div class="select-topic">
                            <fieldset>
                                <select class="form-control" name="business-type" id="business-type">
                                    <option value="">Filter by Business Type</option>
                                    <?php
                                    foreach ($business_types as $business_type) {
                                        ?>
                                        <option value="<?php echo $business_type->term_id; ?>" <?php echo ($business_type->term_id == $_GET['business-type']) ? 'selected' : '';
                                        ?>><?php echo $business_type->name; ?></option>
                                                <?php
                                            }
                                            ?>
                                </select>
                            </fieldset>
                            <span class="glyphicon glyphicon-menu-down select-drop"></span>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <div class="col-sm-2 hidden-xs">
                    <div class="form-group">
                        <button class="btn btn-blue-bg btn-go field-style">Go</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section><!-- Search Resource -->
