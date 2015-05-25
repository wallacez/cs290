<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>How To Embed Graphics In A Webpage Using matplotlib</title>
    <!-- bootstrap css -->
    <link href="bootstrap.css" rel="stylesheet">
  </head>
  <body>
    <!-- page header -->
    <section>
      <div class="page-header">
        <h1 align="center">Part 3: Other Embedding Options</h1>
        <h2 align="center">Pictures and Animations</h2>
    </section>
    <!-- body section -->
    <section>
      <div class="container">
        <p class="text-info">
          Beyond simple graphs or filled plots, here are some other things you can do with the matplotlib library:
        </p>
        <blockquote>
          <p>
            <code>Matplotlib</code>'s <code>cbook</code> module allows you to import images from a sample data collection using the
            <code>get_sample_data</code> functionality
            <img src="image_demo.png"><br>
            This is an image of the Countess Ada Lovelace pulled from the<code> mpl-data/sample_data </code>directory.  Image embedding
            is the same as described on the previous page of this tutorial.
          </p>
        </blockquote>
        <blockquote>
          <a href="http://matplotlib.org/examples/animation/index.html">Animations</a> are another feature possible with <code>matplotlib</code>.  Writing and running them in your local Python environment is easy 
          enough, but to embed them in an html document requires outside libraries and server integration beyond the scope of this tutorial.<br>
          <a href="https://jakevdp.github.io/blog/2013/05/19/a-javascript-viewer-for-matplotlib-animations/">This blog post</a> offers a possible animation embedding functionality, if you choose to pursue this topic yourself.
        </blockquote>
      </div>
    </section>
    <?php 
      echo '<p align="center">Click <a href="5.php">here</a> to go to the next page!'; 
      echo '<p align="center">Click <a href="3.php">here</a> to go to the previous page';      
    ?> 
  </body>
</html>