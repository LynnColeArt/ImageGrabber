# ImageGrabber
A simple php based shell script to randomly select images and put them in a folder.

Does what it says on the tin.
Runs from the command line.
Picks random images from an image dataset at a percentage you stipulate.

So, say you were using ai's to make art with frame intropolation, and you didn't want to use all of the images in your image dataset, well... the day is saved.

Enter the following at the command line
`
php pick images 20
`
If you had an image directory in this directory tree, and 100 images in your image dataset, the result would 20 images. 
So first parameter is your reletive image path. The next is a percentage of the images you want to copy.
When you're done, you'll see the images copied into a "processed" folder under the selected images in your folder tree.

Enjoy.
