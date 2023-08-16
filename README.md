# SPARKS
 The SPARKS 'spark file' editor

## What is SPARKS?

SPARKS is a simple file editor for creating, editing, exporting '[spark files](https://medium.com/the-writers-room/the-spark-file-8d6e7df7ae58)'. It allows for multiple files which can be archived to, and retrieved from, a vault. A video of the MVP version can be seen [here](https://colinwalker.blog/blog/?date=2023-08-10#p1).

Sparks are stored as, and be exported to, plain .txt files so can be used anywhere.

When editing a spark it is automatically saved each time you hit enter, though you can use the manual save button at the bottom. A little, unobtrusive, toast notification appears at the top on each save, just to let you know it's working.

If you choose to create a new spark the existing one will be saved and appear in the vault (unless the file is empty). The vault displays sparks in order of creation; when you restore a spark from the vault it gets resaved with the current date/time so will appear first. There is always an empty 'card' at the end of the vault with a 'new' button.

The latest dated spark is always the one displayed when you first go to the site.

The 'new' button will disappear if the current spark is empty.

If used on mobile, the vault and new buttons will not be visible. Instead, you swipe left to create a new spark and swipe right to view the vault.

## THE TECHIE BIT

Sparks uses jQuery and HTMX (latest versions included at time of publishing) so that everything happens within the context of a single page (making AJAX calls out to the bits that do the work.)

## TRY IT OUT

There is a publically available version of [SPARKS](https://sparks.colinwalker.blog/) 👈 that anyone can try. I reserve the right to clear out any and all 'sparks' without notice. There is no login system on the public version so play nice or I may be forced to change that.

## WARNING!

This is solely the most basic implementation of SPARKS and does not include any security except for an example .htaccess file preventing unwanted access to the .txt files in /pages/. It should not be deployed 'as is' and requires you to integrate your own authentication system or other security.
