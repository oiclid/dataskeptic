<? include("../header.php"); ?>

<div id="bbody">

<h1>OpenHouse</h1>

<table><tr>
<td><img src='dshs.png' /></td>
<td>
<p>
OpenHouse is a community project with the objective of gathering, processing, and exploring home purchasing data.
Today, this data is not readily accessible to the general public on a granular and longitudinal basis, which would
be required to do interesting analysis.  This project seeks to liberate historical and current data on home sales
to enable consumers to make smarter, better informed decisions, and to provide a rich, robust dataset for data
scientists and data visualization people to do interesting work.</p>
</td>
</tr></table>

<p>If you'd like to participate, please <b>email kyle at data skeptic dot com</b> and ask to join our Slack channel.</p>

<p>Check out our <a href="onboarding.php">Onboarding page</a> that will give you some direction on how to get started.</p>

<b>Join us for a live chat discussion of the project every Tuesday at 6:30pm PST in the Data Skeptic Slack channel.</b>

<h2>Mission Statement</h2>
<ul>
<li>Data about active and historic home sales in the United States is difficult if not impossible to access.  It is unnecessarily obfuscated, harming both buyers and sellers.</li>
<li>A variety of companies in the vein of Trulia and Zillow have helped consumers, but they don't offer full featured APIs, making it impossible for a data scientist to access a sufficient dataset to inform their decisions.</li>
<li>In the spirit expressed by true hackers, this information should be free.</li>
<li>An open community driven project should exist to liberate this data and provide tools for accessing new and current data.</li>
<li>Data Skeptic shall launch such a project.</li>
</ul>

<h2>Related Posts</h2>

<p><a href="http://dataskeptic.com/blog/b010_pushing-data-to-home-sales-api.php">Home Sales API upload</a> - blog post showing how to push to the API in Python with very few lines of code.</p>
<p><a href="https://github.com/data-skeptic/data-source-notes">Home to contribute</a> - instructions for how you can share datasources you know about.</p>
<p><a href="http://dataskeptic.com/blog/b009_Crawling-forsalebyowner.php">Blog post on crawling forsalebyowner.com</a> - a disappointing, but instructional crawl.</p>
<p><a href="http://dataskeptic.com/blog/b008_home-sales-so-far.php">Next steps blog post</a> - About milestones.</p>
<p><a href="http://ankoorb.github.io/Housing/index.html">Phoenix Housing Viz</a> - Ankoor put together a visualization of some housing data with D3.</p>
<p><a href="http://dataskeptic.com/epnotes/multiple-regression.php">Multiple regressions</a> - A mini-episode on a basic tool and how Kyle is getting started with applying it to this problem.</p>
<p><a href="http://dataskeptic.com/home-sales/feedback001.php">Feedback #1</a> - Read the criticisms of one listener.</p>
</div>

<h2>Meeting Minutes</h2>
<?
  $files = scandir("mtg-mins/");
  foreach ($files as $file) {
    if (endsWith($file, ".php")) {
      echo("<a href='mtg-mins/" . $file . "'>" . substr($file, 0, strlen($file)-4) . "</a><br/>");
    }
  }
?>
<a href="https://docs.google.com/document/d/1Q-QwIbyECOERaIfO2kJHyrBASsWTXS8kIhS9kChQa3k/edit#heading=h.1pnzdwsrgbl7">2016-05-03</a><br/>
<a href="https://docs.google.com/document/d/1hzlARxetUDax7tuLuC_Nv7Kqb6KQPYhfUUvvRFniZKE/edit#heading=h.mn1vx494in06">2016-05-10</a><br/>
<a href="https://docs.google.com/document/d/15FumPlnsTghHfWYWgPRbnXhdndXjMto6ibSwM_NiO5Q/edit#heading=h.mn1vx494in06">2016-05-17</a><br/>

<? include("../footer.php"); ?>
