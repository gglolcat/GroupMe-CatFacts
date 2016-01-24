<?php
$json = file_get_contents('php://input');
$decoded = json_decode($json);

$facts = array(
        1 => "Cats are the most popular pet in the United States: There are 88 million pet cats and 74 million dogs.",
        2 => "There are cats who have survived falls from over 32 stories (320 meters) onto concrete.",
        3 => "A group of cats is called a clowder.",
        4 => "Cats have over 20 muscles that control their ears.",
        5 => "Much like college students, cats sleep 70% of their lives.",
        6 => "A cat has been mayor of Talkeetna, Alaska, for 15 years. His name is Stubbs.",
        7 => "In tigers and tabbies, the middle of the tongue is covered in backward-pointing spines, used for breaking off and gripping meat.",
        8 => "When cats grimace, they are usually “taste-scenting.” They have an extra organ that, with some breathing control, allows the cats to taste-sense the air.",
        9 => "Cats can’t taste sweetness.",
        10 => "Owning a cat can reduce the risk of stroke and heart attack by a third.",
        11 => "The world’s largest cat measured 48.5 inches long.",
        12 => "Evidence suggests domesticated cats have been around since 3600 B.C., 2,000 years before Egypt’s pharaohs.",
        13 => "A cat’s purr may be a form of self-healing, as it can be a sign of nervousness as well as contentment.",
        14 => "Adult cats only meow to communicate with humans.",
        15 => "The world’s richest cat is worth $13 million after his human passed away and left her fortune to him.",
        16 => "The oldest cat video on YouTube dates back to 1894 (when it was made, not when it was uploaded, duh).",
        17 => "In the 1960s, the CIA tried to turn a cat into a bonafide spy by implanting a microphone into her ear and a radio transmitter at the base of her skull. She somehow survived the surgery but got hit by a taxi",
        18 => "Female cats are typically right-pawed while male cats are typically left-pawed.",
        19 => "Cats make more than 100 different sounds whereas dogs make around 10.",
        20 => "A cat’s brain is 90% similar to a human’s — more similar than to a dog’s.",
        21 => "Cats and humans have nearly identical sections of the brain that control emotion.",
        22 => "A cat’s cerebral cortex (the part of the brain in charge of cognitive information processing) has 300 million neurons, compared with a dog’s 160 million.",
        23 => "Cats have a longer-term memory than dogs, especially when they learn by actually doing rather than simply seeing.",
        24 => "Cats have a lower social IQ than dogs but can solve more difficult cognitive problems when they feel like it.",
        25 => "It was illegal to slay cats in ancient Egypt, in large part because they provided the great service of controlling the rat population.",
        25 => "A cat has five toes on his front paws, and four on the back, unless he’s a polydactyl.",
        26 => "Polydactyl cats are also referred to as 'Hemingway cats' because the author was so fond of them.",
        27 => "There are 45 Hemingway cats living at the author’s former home in Key West, Fla.",
        28 => "Original kitty litter was made out of sand but it was replaced by more absorbent clay in 1948.",
        29 => "Abraham Lincoln kept four cats in the White House.",
        30 => "Isaac Newton is credited with inventing the cat door.",
        31 => "One legend claims that cats were created when a lion on Noah’s Ark sneezed and two kittens came out.",
        32 => "A cat can jump up to six times its length.",
        33 => "A house cat is faster than Usain Bolt.",
        34 => "When cats leave their poop uncovered, it is a sign of aggression to let you know they don’t fear you.",
        35 => "Cats can change their meow to manipulate a human. They often imitate a human baby when they need food, for example.",
        36 => "Cats use their whiskers to detect if they can fit through a space.",
        38 => "Cats only sweat through their foot pads.",
        39 => "Cats have free-floating clavicle bones that attach their shoulders to their forelimbs, which allows them to squeeze through very small spaces.",
        40 => "Hearing is the strongest of cat’s senses: They can hear sounds as high as 64 kHz — compared with humans, who can hear only as high as 20 kHz.",
        41 => "Cats can move their ears 180 degrees.",
        42 => "They can also move their ears separately.",
        43 => "A cat has detected his human’s breast cancer.",
        44 => "A cat’s nose is ridged with a unique pattern, just like a human fingerprint.",
        45 => "Cats have scent glands along their tail, their forehead, lips, chin, and the underside of their front paws.",
        46 => "A cat rubs against people to mark its territory.",
        47 => "Cats lick themselves to get your scent off.",
        48 => "Cats were mythic symbols of divinity in ancient Egypt.",
        49 => "Black cats are bad luck in the United States, but they are good luck in the United Kingdom and Australia.",
        50 => "The Egyptian Mau is the oldest breed of cat."
);

$flair = array(
        1 => "Me-wow!",
        2 => "Me-woah!",
        3 => "Me-awww!",
        4 => "Purr purr",
        5 => "Aww!"
);


if ($decoded->sender_type == "user" && strpos(strtolower($decoded->text), "cat facts") !== false){
sleep(1);
$url = 'https://api.groupme.com/v3/bots/post';

$text = "Cat facts! " . $facts[rand(1,50)] . " " . $flair[rand(1,5)];

include 'bot_id.php';

$data = array('bot_id' => $bot_id, 'text' => $text);

// use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data),
    ),
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);

var_dump($result);    
}
?>
