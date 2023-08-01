<?php
/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_edit_account_form' ); ?>

<?php if (get_field('enable_b2b', 'options')) { ?>
    <section id="dashboard-edit-account">
        <div class="flex justify-center">
            <div class="basis-full sm:basis-3/5 text-base pb-16 px-4 sm:px-6 lg:max-w-5xl">
                <?php do_action('herman_woocommerce_notice'); ?>
                <form class="woocommerce-EditAccountForm edit-account" action="" method="post" <?php do_action( 'woocommerce_edit_account_form_tag' ); ?> >

                    <?php do_action( 'woocommerce_edit_account_form_start' ); ?>

                    <h1 class="mb-4"><?php esc_html_e( 'EDIT ACCOUNT DETAILS', 'woocommerce' ); ?></h1>
                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide mt-2">
                        <label for="contact_person"><?php _e('CONTACT PERSON', 'text-domain'); ?>&nbsp;<span class="required">*</span></label>
                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="contact_person" id="contact_person" value="<?php echo esc_attr(get_user_meta(get_current_user_id(), 'contact_person', true)); ?>" />
                    </p>
                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide mt-2">
                        <label for="store_name"><?php _e('STORE NAME', 'text-domain'); ?>&nbsp;<span class="required">*</span></label>
                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="store_name" id="store_name" value="<?php echo esc_attr(get_user_meta(get_current_user_id(), 'store_name', true)); ?>" />
                    </p>
                    <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first mt-2">
                        <label for="account_email"><?php esc_html_e( 'EMAIL ADDRESS', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                        <input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" autocomplete="email" value="<?php echo esc_attr( $user->user_email ); ?>" />
                    </p>
                    <p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last mt-2">
                        <label for="phone_number"><?php _e('PHONE NUMBER', 'text-domain'); ?>&nbsp;<span class="required">*</span></label>
                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="phone_number" id="phone_number" value="<?php echo esc_attr(get_user_meta(get_current_user_id(), 'phone_number', true)); ?>" />
                    </p>
                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide mt-2">
                        <label for="delivery_address"><?php _e('DELIVERY ADDRESS', 'text-domain'); ?>&nbsp;<span class="required">*</span></label>
                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="delivery_address" id="delivery_address" value="<?php echo esc_attr(get_user_meta(get_current_user_id(), 'delivery_address', true)); ?>" />
                    </p>
                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide mt-2">
                        <label for="invoice_address"><?php _e('INVOICE ADDRESS', 'text-domain'); ?>&nbsp;<span class="required">*</span></label>
                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="invoice_address" id="invoice_address" value="<?php echo esc_attr(get_user_meta(get_current_user_id(), 'invoice_address', true)); ?>" />
                    </p>
                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide mt-2">
                        <label for="kvk"><?php _e('CHAMBER OF COMMERCE (KvK) NUMBER', 'text-domain'); ?>&nbsp;<span class="required">*</span></label>
                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="kvk" id="kvk" value="<?php echo esc_attr(get_user_meta(get_current_user_id(), 'kvk', true)); ?>" />
                    </p>
                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide mt-2">
                        <label for="btw"><?php _e('VAT NUMBER', 'text-domain'); ?>&nbsp;<span class="required">*</span></label>
                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="btw" id="btw" value="<?php echo esc_attr(get_user_meta(get_current_user_id(), 'btw', true)); ?>" />
                    </p>
                    <fieldset>
                        <legend class="mt-6"><?php esc_html_e( 'CHANGE PASSWORD', 'woocommerce' ); ?></legend>

                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide mt-2">
                            <label for="password_current"><?php esc_html_e( 'CURRENT PASSWORD', 'woocommerce' ); ?></label>
                            <p class="text-xs italic"><?php esc_html_e( 'Leave blank to leave unchanged', 'woocommerce' ); ?></p>
                            <input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_current" id="password_current" autocomplete="off" />
                        </p>
                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide mt-2">
                            <label for="password_1"><?php esc_html_e( 'NEW PASSWORD', 'woocommerce' ); ?></label>
                            <p class="text-xs italic"><?php esc_html_e( 'Leave blank to leave unchanged', 'woocommerce' ); ?></p>
                            <input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_1" id="password_1" autocomplete="off" />
                        </p>
                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide mt-2">
                            <label for="password_2"><?php esc_html_e( 'CONFIRM NEW PASSWORD', 'woocommerce' ); ?></label>
                            <input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_2" id="password_2" autocomplete="off" />
                        </p>
                    </fieldset>
                    <div class="clear"></div>

                    <?php do_action( 'woocommerce_edit_account_form' ); ?>

                    <p>
                        <?php wp_nonce_field( 'save_account_details', 'save-account-details-nonce' ); ?>
                        <button type="submit" class="woocommerce-Button button dashboardBtn" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>"><?php esc_html_e( 'SAVE CHANGES', 'woocommerce' ); ?></button>
                        <input type="hidden" name="action" value="save_account_details" />
                    </p>

                    <?php do_action( 'woocommerce_edit_account_form_end' ); ?>
                </form>
            </div>
        </div>
    </section>
<?php } else { ?>
    <section id="dashboard-edit-account">
        <div class="flex justify-center">
            <div class="basis-full sm:basis-3/5 text-base pb-16 px-4 sm:px-6 lg:max-w-5xl">
                <?php do_action('herman_woocommerce_notice'); ?>
                <form class="woocommerce-EditAccountForm edit-account" action="" method="post" <?php do_action( 'woocommerce_edit_account_form_tag' ); ?> >

                    <?php do_action( 'woocommerce_edit_account_form_start' ); ?>

                    <h1 class="mb-4"><?php esc_html_e( 'EDIT ACCOUNT DETAILS', 'woocommerce' ); ?></h1>
                    <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
                        <label for="account_first_name"><?php esc_html_e( 'FIRST NAME', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_first_name" id="account_first_name" autocomplete="given-name" value="<?php echo esc_attr( $user->first_name ); ?>" />
                    </p>
                    <p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last mt-2">
                        <label for="account_last_name"><?php esc_html_e( 'SURNAME', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_last_name" id="account_last_name" autocomplete="family-name" value="<?php echo esc_attr( $user->last_name ); ?>" />
                    </p>
                    <div class="clear"></div>

                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide mt-2">
                        <label for="account_display_name"><?php esc_html_e( 'DISPLAY NAME', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_display_name" id="account_display_name" value="<?php echo esc_attr( $user->display_name ); ?>" /> <span><em class="text-xs"><?php esc_html_e( 'This will be how your name will be displayed in the account section and in reviews', 'woocommerce' ); ?></em></span>
                    </p>
                    <div class="clear"></div>

                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide mt-2">
                        <label for="account_email"><?php esc_html_e( 'EMAIL ADDRESS', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                        <input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" autocomplete="email" value="<?php echo esc_attr( $user->user_email ); ?>" />
                    </p>

                    <fieldset>
                        <legend class="mt-6"><?php esc_html_e( 'CHANGE PASSWORD', 'woocommerce' ); ?></legend>

                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide mt-2">
                            <label for="password_current"><?php esc_html_e( 'CURRENT PASSWORD', 'woocommerce' ); ?></label>
                            <p class="text-xs italic"><?php esc_html_e( 'Leave blank to leave unchanged', 'woocommerce' ); ?></p>
                            <input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_current" id="password_current" autocomplete="off" />
                        </p>
                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide mt-2">
                            <label for="password_1"><?php esc_html_e( 'NEW PASSWORD', 'woocommerce' ); ?></label>
                            <p class="text-xs italic"><?php esc_html_e( 'Leave blank to leave unchanged', 'woocommerce' ); ?></p>
                            <input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_1" id="password_1" autocomplete="off" />
                        </p>
                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide mt-2">
                            <label for="password_2"><?php esc_html_e( 'CONFIRM NEW PASSWORD', 'woocommerce' ); ?></label>
                            <input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_2" id="password_2" autocomplete="off" />
                        </p>
                    </fieldset>
                    <div class="clear"></div>

                    <?php do_action( 'woocommerce_edit_account_form' ); ?>

                    <p>
                        <?php wp_nonce_field( 'save_account_details', 'save-account-details-nonce' ); ?>
                        <button type="submit" class="woocommerce-Button button dashboardBtn" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>"><?php esc_html_e( 'SAVE CHANGES', 'woocommerce' ); ?></button>
                        <input type="hidden" name="action" value="save_account_details" />
                    </p>

                    <?php do_action( 'woocommerce_edit_account_form_end' ); ?>
                </form>
            </div>
        </div>
    </section>
<?php } ?>

<?php do_action( 'woocommerce_after_edit_account_form' ); ?>
