<!DOCTYPE html>
<html>
<head>
	<title>TechX Work Bench</title>
	<link rel="stylesheet" href="files/style.css" />
	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
</head>
<body>
<div id="wrapper">
	<?php include "header.php" ?>

	<div id="home" class="content">
		<h1> Home </h1>



		<div id='books'>
			Thought I might give an insight to the current books i'm reading!
			<table>
				<tr>
					<td>Title</td>
					<td>Page</td>
				</tr>
				<tr>
					<td>C++: From Control Stuctures Through Objects</td>
					<td>358 / 1180 <script> document.write(((358 / 1180) * 100).toFixed(2) + '%') </script></td>
				</tr>
				<tr>
					<td>Professional JavaScript</td>
					<td>181 / 856 <script> document.write(((181 / 856) * 100).toFixed(2) + '%') </script></td>
				</tr>
				<tr>
					<td>AngularJS</td>
					<td>21 / 174 <script> document.write(((21 / 174) * 100).toFixed(2) + '%') </script></td>
				</tr>
				<tr>
					<td>Professional Node.js</td>
					<td>35 / 350 <script> document.write(((35 / 350) * 100).toFixed(2) + '%') </script></td>
				</tr>
				<tr>
					<td>Trig</td>
					<td></td>
				</tr>
				<tr>
					<td>Geology</td>
					<td></td>
				</tr>
			</table>
		</div>

		<div id="filterBar">
			<h4>Tag Filters </h4>
			<div class="filter">Thoughts</div>
			<div class="filter">Tutorials</div>
			<div class="filter">All</div>
		</div> <!-- filterBar -->

		<!-- Empty Template till I program SQL into it 
	
		<div class="postBox Thoughts All">
			<h2 class="postTitle">Back at it!</h2>
			<h5 class="postDate"> Sept 15, 2014 2:30 a.m. </h5>
			<div class="postText">
				<p> 
				</p>

			</div>   postText 

			<div class="tagBox"> 
				Tags: Thoughts
			</div>
		</div>	 postBox -->

		<!-- Empty Template till I program SQL into it -->

		<div class="postBox Thoughts All">
			<h2 class="postTitle">Quicky</h2>
			<h5 class="postDate"> Oct 3, 2014 3:30 a.m. </h5>
			<div class="postText">
				<p> 
					Real quick thought Id' write a few updates. Learned a lot about partitioning, file system types, and their
					pros and cons. Got my Mac able to boot Lubuntu from a FAT32 formatted usb using Grub2. Really quite easy
					compared to formatting the entire USB as an Apple Partition Map for the old iBook. Just need the iso and Grub2
					and there ya go.
				</p><br>
				<p>
					Just placed the book section up here. I like it cause I gave it a percentage as well which will feel nice the
					closer to 100% (although I am disaapointed at the progress of Professional JS). My hopes are once both those
					books are read and done with this semester, I'll have a job programming something. I love it at work, but its
					not what they pay me for. I just practice using it. Everyone loves the thing I made but for some reason MNGT
					wanted to 'discontinue' a project I created in my own spare time... quite pathetic really. Instead of 
					incorporating it into the department they attempted to shun a tool EVERYONE uses. I thought only a few did
					but once they said they wanted to discontinue it, everyone spoke up. Gave me faith in my ability to create
					something useful.
				</p><br>
				<p>
					Also I completed my 21 days of habits! It feels so nice and yet... weird. I did it, I know I can, but I don't
					want to stop. I want to, but I don't. It was really exhausting and I want to take a break but I feel guilty
					now after doing it so long. It feels like a blessing and a curse now. Oh well, it's for the better!
				</p><br>
				<p>
					I also made a quick outline for a tutorial on filesharing between all the OS's and how to go about doing it. 
					What I really want to get going is seeing if I can have multiple versions of Lubuntu (32, 64 bit, PPC Mac, etc)
					and have them all share a casper-rw. Theoretically as long as they are the same version it should work, but a
					simple test proved a little faulty. Once the OS loaded, the screen kinda went black. Oh well though. I'm
					beginning to think it'll be few and far between where I'll need to boot to multiple different kinds of computers
					unless I get serious in trying to repair/salvage data/start people on linux. I only need a version for my PC and
					iBook, and possibly a work one some time down the road. Lots to do with so little time..
				</p>

			</div> <!--   postText  -->

			<div class="tagBox"> 
				Tags: Thoughts
			</div>
		</div>	<!--  postBox -->
	
		<div class="postBox Thoughts All">
			<h2 class="postTitle">Back at it!</h2>
			<h5 class="postDate"> Sept 15, 2014 2:30 a.m. </h5>
			<div class="postText">
				<p> 
					Real quick to meet my habit (hehe) I learned localStorage the other day! Its pretty cool. I got a response
					regarding a job offer for great pay! Awesome right! I've finished messing with the tiny stuff in Skyrim and
					feel a little more free from its nasty grasp! I'm going to start a small little section about the current
					books I'm reading. To both share my interests and get a better picture of what I should read now or next.
					Also set up an appointment with the DMV for my diver's license renewel. Got a whole lot of crap done at work
					and learned an important lesson, BACK UP YOUR STUFF. No harm no foul though, was able to get it resolved.
				</p>
				<br>
				<p>
					Other than that it was a pretty good day, learned I should start looking for programmer oriented jobs that
					need my current level of experience versus going after jobs with my non-professional experience. We'll see
					how that job search goes. Reminds me I need to fix my job alerts. I should be getting a new batch with my
					new searches pretty soon, hopefully they're a better match! Alright time to do some pushups and get to bed!
				</p>

			</div>  <!--  postText  -->

			<div class="tagBox"> 
				Tags: Thoughts
			</div>
		</div>	<!--  postBox  -->
	
		<div class="postBox Thoughts All">
			<h2 class="postTitle">On a roll</h2>
			<h5 class="postDate"> Sept 22, 2014 1:30 a.m. </h5>
			<div class="postText">
				<p> 
					Just a quick note, as I still should program <em>something</em>, I need new innovative idea's for web apps.
					Or at least come up with some good practice problems. This site has litterally one function in javascript.
					I don't want to be a blogger or designer, I want to be a developer. It's hard enough figureing out <em>
					how</em> to do something, but now <em>what</em> to do? I know I need to set up Git and Github now that I have
					linux in place (I couldn't before due to Github won't work with XP). I also feel a need to get away from
					jQuery for a while and do stuff in pure JavaScript. jQuery almost makes it <em>too</em> easy.
				</p>
				<br>
				<p>
					I guess I should go ahead and try to make the posts work live in the web browser versus hard coding into the
					HTML. Get the much needed practive with designing MySQL statements and PHP. My problem with that is, I wanted
					to lean away from MySQL and PHP and lean towards creating this blog with Node.js and MongoDB. The best
					option I suppose for that would be to have nodeschool.io or some other tutortial count as writing or
					programming. That leads me to looking for another web-host to host Node.js as well though. I guess I could
					come up with a different name for my web-apps over there.
				</p>
				<br>
				<p>
					What this all really boils down to though is, I want a job doing this stuff so I can stop worrying about
					creating an employable skillset and just <em>program</em>. At this point I feel caught trying to create a
					portfolio but also wanting to learn/practice a new language, create a piece of work I can show <em>
					immediately</em> verus a couple months down the road when it's finished. Like I would <em>love</em> to make
					a game, but that I feel would take so much time. I got pretty close but with some roadblocks like collision
					detection, they couldn't flourish as games.
				</p>
				<br>
				<p>
					Give's me an idea, but I think it would be far beyond my skillset to create my own colision detecting
					code/library/plug-in or whatever. It would certainly be fun and a challenge and produce a tangible piece
					of work to show via Github or Bitbucket. I just wonder how long that would take to make... (I got close
					but it proved more knowledge of JS or a plug-in was needed).
				</p>	

			</div>  <!-- postText -->

			<div class="tagBox"> 
				Tags: Thoughts
			</div>
		</div>	<!-- postBox -->

		<div class="postBox Thoughts All">
			<h2 class="postTitle">Keep on Keepin on</h2>
			<h5 class="postDate"> Sept 20, 2014 12:00 a.m. </h5>
			<div class="postText">
				<p> 
					In lieu of programming today I'll write something quick and short. Have to find a new job now, 5 more people
					got laid off in my department. Luckily I've been doing well in school and reading ahead in my C++ class. 
					Feel more employable knowing the basics of C++ on top of the web languages. Fixed my ZipRecruiter alerts,
					hopefully they come up with some more suited towards me. Pretty soon I'll have to take that initial pay cut
					and maybe forego school for a semester or two to pay the bills, as long as they have health insurance. That's
					the worst part of it all, its not the not having a job, its losing good health insurance. I really can't
					believe the coolest most laid back job I've had for 3 year's is actually coming to an end here soon. The
					upward movement is bs, but while I am in school, it could not be any better to be honest. It's sad and
					just frustrating it can't stay for another couple years. Alas all good things must come to an end.
				</p>
				<br>
				<p>
					My habits have been going well, I've been sticking to them like glue (even if I count some as 2 habits
					in one). Only one day I didn't work out, but a day of rest is good anyhow. Meditate for at LEAST 5 minutes.
					90% have been 10 minutes. The homework is one of the biggest struggles, but most effective. I've stayed
					on top of all my homework for all my classes thus far. I read a lot so that one I never really have to
					worry about. Writing or programming isn't hard on work days, or when a project is do, but with Skyrim,
					it's become increasingly hard to start on a new project or at least finish this blog. Chores aren't that
					hard to get done, as long as my desk/room isn't a mess, they've been handled. 
				</p>
				<br>
				<p>
					There's more and I know it's early but I also have to wake up early so I'll cut it off there, still have
					 to do 10 mintes of	clearing my head before I hit the hay. Maybe this will become a constructive blog one day.
				</p>

			</div> <!--  postText -->

			<div class="tagBox"> 
				Tags: Thoughts
			</div>
		</div>	<!-- postBox -->



		<div class="postBox Thoughts All">
			<h2 class="postTitle">Back at it!</h2>
			<h5 class="postDate"> Sept 15, 2014 2:30 a.m. </h5>
			<div class="postText">
				<p> 
					Man what a week! Its Sept 15 at 2:30 am and boy am I tired! I started doing this daily
					habit routine which is honestly making me feel very productive and getting things done
					ontime. That's why I'm writing here since write/program is one of the things I have to
					do daily, whether I like it or not, for 21 days. So far its been 5 days and I have been
					on top of everything. It makes it easier that my PS3 controllers don't work for Skyrim,
					but thats why these are in place. I could, and have, played that game for hours without
					a break. To counter act that unproductive and lazy attitude I developed my 6 essential daily habits.
					<br><br>
					1. Workout - This one goes without saying, you think better, look better, and feel better.
					<br><br>
					2. Read - I read a lot of stuff online, rarely is it crap, but it's also there to remind me
					I need to focus and read essential things to boost my self and career forward. Namely school
					books and technical books which leads me to my next habit.
					<br><br>
					3. Homework - Unless all of my homework for all my classes is done (very, very rarely) I need
					to do at least <em>some</em> homework to get closer to getting it done ontime.
					<br><br>
					4. Chores - When I got into the "Let me get started in linux, it'll be fun!" mood, I let my desk,
					my eating habits, and my hygeine go out the window. I didn't care if I ate, I didn't care if
					my desk was a mess, I could use it. I didn't even care if I hadn't taken a shower in the last
					day or so (I could never go 3 full days without showering though). I needed to make it a habit
					of tidying up <em>even if</em> it was a tiny little bit like a dish.
					<br><br>
					5. Write/Program - This is to get into the creative/productive mindset. Since I am starting with
					only 6 (although it feels like a lot now), I combined writing and programming for now. I have a
					habit of programming for 4-6 hours for a day to a week, and taking a day to a week off. I know
					I can get more done in this area so I needed to make it something I did everyday, hopefully
					becoming more efficient as well. I will split these into 2 once it's been about 30-45 days straight
					of doing one or the other. Also I havn't written on my other "blog" in a long time. With this in
					place, that'll change quickly.
					<br><br>
					6. Meditate - Last but certainly not least, meditate. This is something I started and was doing
					frequently and enjoyed. Lately I havn't been making the time to do it. I had the "eh I'm tired,
					I'll do it tomorrow" mentality toward it, but <em>never</em> got to it. A quick ten minutes before
					I go to sleep and I feel like a sleep rather deeply. It helps me think about things about the day,
					sort them out, and clear them from my mind to start anew.
				</p>
				<br>
				<p> 
					All of these are to increase 3 out of the 5 areas I'd like to work on daily. Those are
					intellectual, physical, spiritual/emotional, financial, and social. All of these being improved make
					a well rounded person that can handle just about anything at anytime. It helps to look at it in
					an RPG perspective (since I'm addicted to improving pixelated heros). You know, stats like int, 
					str, agi, wis, char. Millions of people have no problem doing it to fictional characters in the
					boundaries of a game, but will never do so for themselves. I want to switch the focus from the sword
					slashing, magic weaving, knife stabbing heroes, to myself. 
				</p>
				<br>
				<p> 
					If we can get our characters oodles of money, the highest stats, and the broadest of skills, why 
					can't we do that for ourselves?
				</p>

			</div> <!--  postText -->

			<div class="tagBox"> 
				Tags: Thoughts
			</div>
		</div>	<!-- postBox -->

	</div> <!-- content -->
		

</div> <!-- wrapper -->

<script src="files/javascript.js"></script>
</body>
</html>