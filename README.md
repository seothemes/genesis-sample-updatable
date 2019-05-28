# Genesis Sample Theme with Automatic Updates

Proof of concept for allowing automatic updates in the Genesis Sample theme without losing customizations.

__Important:__ This project is for demonstration purposes only and should not be used in production!


## Installation Instructions

1. Install the Genesis Framework parent theme on your testing site.
2. Download the [version 1.0.0](https://github.com/seothemes/genesis-sample-updatable/releases/download/1.0.0/genesis-sample-updatable.zip) release and upload it to your testing site.
3. Go to your WordPress dashboard and select Appearance, then activate the Genesis Sample theme.
4. Inside your WordPress dashboard, go to Appearance > Theme Editor and select Genesis Sample theme.
5. Add a custom code snippet to the style.css file and/or the functions.php file.
6. Navigate to Appearance > Themes, there should now be an update notice showing for version 2.0.0.
7. Click update and once it has finished running, refresh the page.
8. There should now be 3 themes - Genesis, Genesis Sample and Genesis Sample 1.0.0 Backup.
9. Navigate to Appearance > Theme Editor and select the new Genesis Sample theme.
10. Check that your custom code snippets were carried over to the new version.

## FAQs

### How does it prevent customizations being lost?

Magic!

Actually, it works like this:

1. Before running the update, a full backup of the original theme is made.
2. After the update has finished, the version number in the backup style.css file is updated.
3. Then, all of the files in the backup are copied over to the new version - excluding the `updatable/` folder.

By using the `updatable` directory method, the child theme can be used for it's intended purpose and allows the following things to happen:

1. User can add custom CSS to style.css.
2. User can add custom PHP code snippets to functions.php.
3. User can add custom JS to a file, e.g script.js.
4. User can add custom page templates with full access to the template hierarchy.
5. User can add custom PHP files and include them in functions.php.
6. User can add custom theme name, and even rename the theme folder.
7. User can add custom screenshot image.

Usually, none of this is possible because all of these customizations would be overwritten during the update process. By placing all updatable code in a specific folder, the rest of the theme is free for the user to customize.

### Why can't I see the `updatable` folder in the Theme Editor?

This example theme includes a custom function which hides the `updatable` folder from the WordPress Admin Theme Editor. This would most likely be used in real world themes to prevent the majority of users finding and editing this directory. Add the following code snippet to functions.php to enable the directory in the theme editor:

```php
remove_filter( 'theme_scandir_exclusions', 'genesis_sample_scandir_exclusions' );
```

### Why is the config directory not in `updatable`?

Ideally the `config` directory would also be placed inside the `updatable` directory. Currently there are no available filters for changing the location of the theme config files so it needs to be located in the theme root directory. Hopefully some filters are added in a future version of Genesis to allow the config directory to be moved.

### How do I know if `updatable` was updated?

In version 2.0.0 of this theme, there is a comment on [line 13](https://github.com/seothemes/genesis-sample-updatable/blob/develop/updatable/functions.php#L13) of the `updatable/functions.php`:

```php
// This line only exists in version 2.0.0.
```

When you download version 1.0.0 and open the `updatable/functions.php` file, you will notice that the comment is not there. After updating to 2.0.0, you can open this file and check if the comment has been added. If you now see the comment then the update was successful - the `updatable` directory was overwritten.

### Update failed: Theme already at latest version.

This happens when the child theme folder is not `genesis-sample-updatable`. Renaming the folder back to this will fix the issue. While it is possible to rename the theme folder using the Child Theme Updater, it's not implemented in this example project.
