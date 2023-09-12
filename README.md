FeedBack Module
ETA-24hrs

Task-1:
    • Creating a custom Magento module to add the link at the footer. 
      app->code->VendorName->ModuleName
      
    • Using the Magento form builder, create a custom form with fields for first name, last name, email, and comment. 
      view->frontend->layout->form.xml
      
    • Using built-in validation classes, validating the form input.
      
    • When we submit the form successfully, controller will redirect the user to the homepage and display a success message using session messages.
      ModuleName->controller->action
      
    • Create a custom admin menu item under "Customers" to manage feedback.
      etc->adminhtml->menu.xml
      
    • Creating a grid to display the list of submitted feedback with pagination,sorting and searching  using Magento UI components.
      view->adminhtml->uicomponent->grid.xml
      
Task-2:
    • Develop custom email templates for approval and decline notifications.
      
    • Implement the controller action responsible for sending the corresponding email to the customer upon the admin's "Approve" or "Decline" action.
      
    • Modify the admin grid to display the feedback status and Create a CMS block or widget to display approved feedback on the homepage in a scroller.

Task-3:
    • If the customer logged-in pre-populate the form fields with their first name, last name, and email from the user details. To achieve this we retrieving customer data using Magento's customer session.
      
    • create an email template for sending feedback confirmation emails to customers and configure the BCC to the store admin's email address retrieved from configuration.
      view->frontend->email->feedback_confirmation.html
      
    • Changing the admin grid by adding a "View" link to each feedback record. When clicked, this link should direct users to a custom admin controller action.
      
    • Create a custom landing page to display the selected feedback record along with "Approve" and "Decline" buttons at the top. Use a controller to fetch and display the feedback details
      Controller->Feedback->View.php
      view->frontend->layout->view.xml
      view->frontend->templates->feedback->view.phtml
