<?php
// add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
//  function wp_enqueue_scripts() {
// wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
// }

function arconcontainer_enqueue_scripts()
{
    wp_enqueue_script('custom-jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js', array(), '1.0', true);
    wp_localize_script('custom-jquery', 'admin_url', array('ajaxUrl' => admin_url('admin-ajax.php')));


    wp_enqueue_script('slick-js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array(), '1.0', true);
    wp_enqueue_style('slick-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css', array(), '1.0', 'all');
    wp_enqueue_style('slick-theme', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css', array(), '1.0', 'all');
    
    wp_enqueue_style('custome-css', get_stylesheet_directory_uri() . '/assets/css/main.css', null, wp_get_theme()->get('Version'));
    wp_enqueue_style('twenty-twenty-one-style', get_stylesheet_directory_uri() . '/assets/css/style.css', null, wp_get_theme()->get('Version'));

    wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/assets/js/all.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'arconcontainer_enqueue_scripts');


function add_clarity_tracking_script() {
    $clarityTrackingId = 'ighaqc57nn'; // Configured on clarity website

    if (!empty($clarityTrackingId)) {
        echo "
        <script type='text/javascript'>
          (function(c,l,a,r,i,t,y){
            c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
            t=l.createElement(r);t.async=1;t.src='https://www.clarity.ms/tag/'+i;
            y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
          })(window, document, 'clarity', 'script', '{$clarityTrackingId}');
        </script>
        ";
    }
}

// Hook the function to wp_head to ensure it gets added to the head section
add_action('wp_head', 'add_clarity_tracking_script');


function add_chatbot_script() {
    ?>
    <script type="text/javascript">
        // Create the script element
        const chatBotScript = document.createElement('script');
        chatBotScript.type = 'text/javascript';
        chatBotScript.id = 'zsiqchat';
        
        // Add the chatbot script content
        chatBotScript.innerHTML = `
            var $zoho=$zoho || {};
            $zoho.salesiq = $zoho.salesiq || {
                widgetcode: "siq6938c55e08d7f4e76d00ce303bb6f090c0d0447d9f9f0f0573751f17a75596cf",
                values:{},
                ready:function(){}
            };
            var d=document, s=d.createElement("script");
            s.type="text/javascript";
            s.id="zsiqscript";
            s.defer=true;
            s.src="https://salesiq.zohopublic.in/widget";
            var t=d.getElementsByTagName("script")[0];
            t.parentNode.insertBefore(s,t);
        `;
        
        // Append the script element to the document head
        document.head.appendChild(chatBotScript);
    </script>
    <?php
}
add_action('wp_head', 'add_chatbot_script');













function myplugin_settings() {  
    // Add tag metabox to page
    register_taxonomy_for_object_type('post_tag', 'page'); 
    // Add category metabox to page
    register_taxonomy_for_object_type('category', 'page');  
}
 // Add to the admin_init hook of your theme functions.php file 
add_action( 'init', 'myplugin_settings' );


add_action('wpcf7_mail_sent', 'custom_cf7_form_submission');

function custom_cf7_form_submission($contact_form) {
    // Get the form ID
    $form_id = $contact_form->id();

    // Check if the form ID matches the desired form ID
    if ($form_id == 1146) {
        // Get the submitted form data
        $submission = WPCF7_Submission::get_instance();
        if ($submission) {
            $posted_data = $submission->get_posted_data();

            // Extract form data
            $name = isset($posted_data['Name']) ? $posted_data['Name'] : '';
            $company_name = isset($posted_data['CompanyName']) ? $posted_data['CompanyName'] : '';
            $email_id = isset($posted_data['EmailID']) ? $posted_data['EmailID'] : '';
            $mobile_number = isset($posted_data['MobileNumber']) ? $posted_data['MobileNumber'] : '';
            $booking_number_inquiry_number = isset($posted_data['BookingNumberInquiryNumber']) ? $posted_data['BookingNumberInquiryNumber'] : '';
            $category = isset($posted_data['Category']) ? implode(', ', (array)$posted_data['Category']) : '';

            $enteryourcomments = isset($posted_data['Enteryourcomments']) ? $posted_data['Enteryourcomments'] : '';

            // Prepare data for the API request
            $data = [
                'raised_by_name' => $name,
                'company_name' => $company_name,
                'raised_by_email' => $email_id,
                'mobile' => $mobile_number,
                'booking_number' => $booking_number_inquiry_number,
                'category' => $category,
                'description' => $enteryourcomments
            ];

            $json_data = json_encode($data);

            // API endpoint and headers
            $url = 'https://coretms.arconcontainer.com/api/tms/tickets/';
            $headers = [
                'Content-Type: application/json',
                'X-Api-Key: ' . 'p4yaVErdP1PfNXtIQPFiQ2dLK26SHjrI',
                'X-App-Secret: ' . 'Ih8eDCvoNtzxuh1myzx2pM1AwuLarw4KRlA2tKqpcEHTM61t919wmYl5AeTW5DjP'
            ];

            // Initialize cURL session
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);

            // Execute the request
            $response = curl_exec($ch);

            // print'<pre>'; print_r($response);

            // Check for errors
            if (curl_errno($ch)) {
                error_log('cURL error: ' . curl_error($ch));
            } else {
                error_log('API response: ' . $response);
            }

            // Close the cURL session
            curl_close($ch);
        }
    }
}

// For contact form and feedback form category wise recipients. 10/7/2024
function cf7_custom_email_recipient($contact_form) {
   
    $form_id = $contact_form->id();
   
    if ($form_id == 1146) {
       
        $submission = WPCF7_Submission::get_instance();
        if ($submission) {
            $posted_data = $submission->get_posted_data();

             $selected_category = isset($posted_data['Category']) ? implode(', ', (array)$posted_data['Category']) : '';
             
             $recipients = array(
                'Shipment Issue' => 'tushar.patil@amuratech.com',
                'Complaint' => 'tech@amuratech.com',
                'Positive Feedback' => 'kedar.kane@amuratech.com',
                'Business Enquiry' => 'tushar.patil@amuratech.com',
                'Business Association' => 'tech@amuratech.com',
                'Others' => 'tushar.patil@amuratech.com',
            );

            if (array_key_exists($selected_category, $recipients)) {
                $mail = $contact_form->prop('mail');
                $mail['recipient'] = $recipients[$selected_category];
                $contact_form->set_properties(array('mail' => $mail));
            }
        }
    }

    else if ($form_id == 7) {
       
        $submission = WPCF7_Submission::get_instance();
        if ($submission) {
            $posted_data = $submission->get_posted_data();

             $selected_topic = isset($posted_data['topics']) ? implode(', ', (array)$posted_data['topics']) : '';
             
             $recipients = array(
                'Business Related Inquiry' => 'tushar.patil@amuratech.com',
                'Career Related Inquiry' => 'tech@amuratech.com',
                'Information About Arcon' => 'kedar.kane@amuratech.com',
                'Request for Trading/Leasing/One-way' => 'tushar.patil@amuratech.com'
            );

            if (array_key_exists($selected_topic, $recipients)) {
                $mail = $contact_form->prop('mail');
                $mail['recipient'] = $recipients[$selected_topic];
                $contact_form->set_properties(array('mail' => $mail));
            }
        }
    }
}   
add_action('wpcf7_before_send_mail', 'cf7_custom_email_recipient');