# Changes made since Project 1:

## Straight Up Changes:

### 1. Changes to the home page

The main thing that I changed on the homepage (located at index.php) was that I created a variable to store the path the images, an array that has all of the names of the images, and an array that has all of the alternate descriptions that need to go in an HTML image tag. I then use a for loop in the actual HTML to display all of the images. In the Gist, it says that I am going to add space between all of the images but it looked bad so I didn't.

### 2. Changes to the Latsko Machete Gang Page

The next thing that I changed was the hover effect on the Latsko Machete Gang page. Before, it showed the name of each subject underneath each image. Now, it features the name of the subject of each image directly on the image on a partially translucent background so that you can still see the image underneath. Each hover effect also includes the Tinder bio of my two siblings, as well as my obvious Tinder bio (if I had a Tinder account) that states that "Graphic design is my passion" in the best font ever, Comic Sans. This is an obviously true statement that you can see from the stellar design on this website.

## Straight Up Additions:

### 1. Register Page

I replaced the page that used to just have ugly pictures of Riley on it with a page that has an actual purchase, for people to register on this site for basically no reason. This register form takes a person's full name, email address, and a password. The password has to be at least 6 characters, the name has to be at least three characters and only be a combination of letters and spaces, and the email address must contain an "@" sign. When a user hits the submit button, a notification that there were problems with his or her inputs is displayed or a success message is displayed, stating that the user can now sign in. The error messages are specific about what area of the form there's a problem with. There is also a link to the sign in page underneath the submit button. The password is hashed in the database for extra super secret security.

The database was created using phpMyAdmin. The database is called webdev_project and the table is called uglyStinkers.

### 2. Sign In Page

I added a new page for the user to enter the email address that he or she signed up with, as well as his or her password and sign in. There is also a link that redirects the user directly to the register page if he or she needs an account. When the user hits the sign in button, a few things happen. The first is that he or she is redirected back to the home page. The second is that a welcome message that says "Welcome, <name>!" is shown in the top left of the screen and will appear on every page. The third thing is that the Sign In and Register tabs in the navbar at the top of the screen disappear and are replaced with a single option, the Sign Out tab. 

### 3. Sign Out Button

The last thing that I added to the site is a sign out option in the navbar at the top of the page. When a user hits this button, it redirects back to the home page, the sign out option in the navbar disappears, and the Sign In and Register options come back. The welcome message in the top left the of the screen also disappears.
