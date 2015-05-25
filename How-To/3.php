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
        <h1 align="center">Part 2: Setting Up The Graphing Environment</h1>
        <h2 align="center">Using The Shell To Run Programs</h2>
    </section>
    <!-- body section -->
    <section>
      <div class="container">
        <p class="text-info">
          Now that <code>matplotlib</code> is setup on your computer, it's time to use it!<br><br>
          Below I will show some examples of plots that are able to be created with <code>matplotlib</code>'s functionality.  All of the following images use 
          source code freely available on the <a href="http://matplotlib.org/examples/index.html">website</a>.  Because this is a tutorial on embedding these images,
          not creating them, I will not go into depth on how to write the code.  Again, the source code is free to read and download on the website for you to 
          peruse at your leisure.
        </p>
        <blockquote>
          <p>
            Here is an image of a fairly simple plot you can produce in <code>matplotlib</code>
            <img src="fill_demo.png"><br>
            Here is how to embed it into your webpage:<br>
            <ol>
              <li>
                First, save this code as a .py file (e.g. fill_demo.py):<br>
                <code>
                  import numpy as np<br>
                  import matplotlib.pyplot as plt<br><br>
                  
                  x = np.linspace(0, 1)<br>
                  y = np.sin(4 * np.pi * x) * np.exp(-5 * x)<br><br>
                  
                  plt.fill(x, y, 'r')<br>
                  plt.grid(True)<br>
                  plt.show()<br><br>
                </code>
                <br>
              </li>
              <li>
                Next, Click the 'save' icon in the menu bar at the top of the figure<br>
                <img src="fill_demo_clipped.png">
              </li><br>
              <li>
                Finally use that file as the <code>src</code> attribute in an image tag in an html document!
                <br><code>img src="fill_demo.png"</code>
                <img src="fill_demo.png">
              </li>
            </ol>
            <br>It's as easy as that!
          </p>
        </blockquote>
      </div>
    </section>
    <?php 
      echo '<p align="center">Click <a href="4.php">here</a> to go to the next page!'; 
      echo '<p align="center">Click <a href="2.php">here</a> to go to the previous page';      
    ?> 
  </body>
</html>
