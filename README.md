# Genesis Sample Theme with Automatic Updates

Proof of concept for allowing automatic updates in the Genesis Sample theme without losing customizations.


## Installation Instructions

1. Upload the Genesis Sample theme folder via FTP to your wp-content/themes/ directory. (The Genesis parent theme needs to be in the wp-content/themes/ directory as well.)
2. Go to your WordPress dashboard and select Appearance.
3. Activate the Genesis Sample theme.
4. Inside your WordPress dashboard, go to Appearance > Theme Editor and change the style.css version to 1.0.0.
5. Add a custom code snippet to the style.css file and/or the functions.php file.
6. Navigate to Appearance > Themes, there should now be an update notice showing.
7. Click update and once it has finished running, refresh the page.
8. There should now be 3 themes - Genesis, Genesis Sample and Genesis Sample 1.0.0 Backup.
9. Navigate to Appearance > Theme Editor and select the new Genesis Sample theme.
10. Check that your custom code snippets were carried over to the new version.

## Why is the config directory not in `updatable`?

Ideally the `config` directory would also be placed inside the `updatable` directory. Currently there are no available filters for changing the location of the theme config files so it needs to be located in the theme root directory. Hopefully some filters are added in a future version of Genesis to allow the config directory to be moved.

## How do I know if `updatable` was updated?

Follow the steps below to check that the updatable directory was correctly updated:

1. Follow steps 1 to 5 in the [Installation Instructions](#installation-instructions) above.
2. Before updating, add a code snippet to the `/updatable/style.css` file (not the style.css file in the root directory).
3. Run the update.
4. Navigate to Appearance > Theme Editor and select the new Genesis Sample theme.
5. Open the `updatable/style.css` file and check if the code snippet is there.

If the custom code snippet is not there then the update was successful.
