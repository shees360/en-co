<?php
$input = strtolower(trim($_POST['message'] ?? ''));

$moodKeywords = [
  'sad' => [
    'sad',
    'feeling down',
    'depressed',
    'really low',
    'feeling blue',
    'crying',
    'heart hurts'
  ],
  'tired' => [
    'tired',
    'so exhausted',
    'drained',
    'worn out',
    'feeling weak',
    'burnt out',
    'need rest'
  ],
  'anxious' => [
    'anxious',
    'nervous',
    'worried',
    'panic',
    'afraid',
    'overthinking',
    'feeling scared'
  ],
  'happy' => [
    'happy',
    'joyful',
    'excited',
    'great',
    'cheerful',
    'smiling',
    'blessed'
  ],
  'alone' => [
    'alone',
    'lonely',
    'isolated',
    'ignored',
    'left out',
    'abandoned',
    'no friends'
  ],
  'greeting' => [
    'hi',
    'hello',
    'hey',
    'good morning',
    'good evening',
    'how are you',
    'what’s up'
  ],
  'thanks' => [
    'thank you',
    'thanks',
    'thx',
    'appreciate it',
    'grateful',
    'many thanks',
    'thanks a lot'
  ],
  'fine' => [
    'fine',
    'okay',
    'ok',
    'alright',
    'doing well',
    'not bad',
    'so-so'
  ],
  'yes' => [
    'yes',
    'yeah',
    'yep',
    'sure',
    'absolutely',
    'of course',
    'definitely'
  ],
  'confused' => [
    'confused',
    'not sure',
    'lost',
    'don’t understand',
    'mixed up',
    'feeling puzzled',
    'brain fog'
  ],
  'motivated' => [
    'motivated',
    'ready to go',
    'excited',
    'pumped up',
    'let’s do this',
    'feeling driven',
    'full of energy'
  ],
  'frustrated' => [
    'frustrated',
    'so annoyed',
    'fed up',
    'losing patience',
    'irritated',
    'upset',
    'really angry'
  ],
  'hopeful' => [
    'hopeful',
    'looking forward',
    'optimistic',
    'things will get better',
    'feeling positive',
    'keeping faith',
    'staying strong'
  ],
  'bored' => [
    'bored',
    'nothing to do',
    'so restless',
    'need excitement',
    'feeling dull',
    'looking for fun',
    'just meh'
  ],
  'grateful' => [
    'grateful',
    'thankful',
    'blessed',
    'appreciate life',
    'feeling lucky',
    'so thankful',
    'full of gratitude'
  ],
  'lonely' => [
    'lonely',
    'feeling isolated',
    'no company',
    'missing friends',
    'feeling empty',
    'all alone',
    'want someone'
  ],
  'curious' => [
    'curious',
    'want to learn',
    'interested',
    'need to know',
    'asking questions',
    'exploring ideas',
    'thinking deeply'
  ],
  'relaxed' => [
    'relaxed',
    'calm',
    'at peace',
    'feeling chill',
    'taking it easy',
    'stress free',
    'all good'
  ],
];

$replyBank = [
  'sad' => [
    "It's okay to feel sad sometimes. I'm here with you.",
    "Even when you're down, the sun will shine again.",
    "Your feelings matter. Take all the time you need.",
    "Remember, sadness is part of healing.",
    "You are stronger than you realize.",
    "Let yourself feel, and don't be afraid to ask for help.",
    "Sending you a virtual hug. You're not alone."
  ],
  'tired' => [
    "Rest is important. Take care of yourself today.",
    "You’ve been working hard. It's okay to slow down.",
    "Your body and mind deserve a break.",
    "Recharge your energy; you’ll feel better soon.",
    "Even superheroes need rest sometimes.",
    "Listening to your body is a sign of strength.",
    "Take it easy — tomorrow is a new day."
  ],
  'anxious' => [
    "Breathe deeply. You are safe in this moment.",
    "Anxiety can be tough, but you’re tougher.",
    "Remember, feelings of worry don’t define you.",
    "Take things one step at a time.",
    "You’ve overcome challenges before, you can again.",
    "Focus on what you can control right now.",
    "I'm here to listen whenever you need."
  ],
  'happy' => [
    "I'm so glad you're feeling happy!",
    "Keep shining your beautiful light.",
    "Enjoy every moment of this joy.",
    "Your happiness is contagious — spread it around!",
    "Celebrate the good vibes today.",
    "Smiles suit you well!",
    "Grateful to hear you're doing great."
  ],
  'alone' => [
    "You might feel alone, but you are deeply valued.",
    "Connections can be found in unexpected places.",
    "I'm here to keep you company.",
    "Remember, this feeling is temporary.",
    "You matter more than you know.",
    "Reach out when you feel ready — you’re not alone.",
    "There’s always someone who cares about you."
  ],
  'greeting' => [
    "Hello! It's wonderful to hear from you.",
    "Hey there! How can I brighten your day?",
    "Hi! I’m here whenever you want to chat.",
    "Good day! Hope you're feeling well.",
    "Hello friend! What's on your mind today?",
    "Hey! Ready for some encouragement?",
    "Hi there! I’m listening."
  ],
  'thanks' => [
    "You're very welcome!",
    "No problem at all — happy to help!",
    "I'm glad I could support you.",
    "Anytime! You're doing great.",
    "Thanks for reaching out!",
    "Always here if you need me.",
    "I appreciate you too!"
  ],
  'fine' => [
    "I'm glad to hear you're doing fine.",
    "Even feeling 'fine' is a step forward!",
    "Keep going, you're doing well.",
    "Sometimes 'fine' is just enough — and that's okay.",
    "Stay positive and take care of yourself.",
    "I'm here if you want to talk more.",
    "Glad you're hanging in there."
  ],
  'yes' => [
    "Great! Let's keep up the momentum.",
    "Awesome! I'm cheering you on.",
    "Fantastic! You're making progress.",
    "That's the spirit!",
    "Love your enthusiasm!",
    "Keep it up!",
    "You’ve got this!"
  ],
  'confused' => [
    "It's okay to feel confused sometimes.",
    "Take your time to figure things out.",
    "Questions are the start of learning.",
    "I'm here to help if you need clarity.",
    "Confusion means you're growing.",
    "Try to focus on one thing at a time.",
    "Don’t hesitate to ask for help."
  ],
  'motivated' => [
    "Your motivation is inspiring!",
    "Keep pushing forward — you can do this!",
    "I love your energy!",
    "Stay focused and chase your dreams.",
    "You’re capable of amazing things.",
    "Keep that fire burning!",
    "Believe in yourself, always."
  ],
  'frustrated' => [
    "I understand that frustration — it's tough.",
    "Take a deep breath, it will pass.",
    "Remember, setbacks are temporary.",
    "You’re stronger than your struggles.",
    "Try to take a moment to reset.",
    "I'm here if you want to vent.",
    "Keep going, you’re doing your best."
  ],
  'hopeful' => [
    "Hope is a powerful thing — hold on to it.",
    "Better days are coming your way.",
    "Keep believing in the good things ahead.",
    "Your optimism is wonderful.",
    "Stay hopeful and keep moving forward.",
    "The future looks bright for you.",
    "Never lose your sense of hope."
  ],
  'bored' => [
    "Sometimes boredom is a chance to rest your mind.",
    "Maybe try something new to spark excitement!",
    "I’m here if you want to chat.",
    "Boredom can lead to creativity.",
    "Take a walk or do something fun!",
    "Use this time to relax and recharge.",
    "Let's find something interesting to talk about!"
  ],
  'grateful' => [
    "Gratitude brings more reasons to smile.",
    "It's great to see your thankful heart.",
    "Keep appreciating the little things.",
    "Your gratitude is inspiring.",
    "Being thankful is a beautiful mindset.",
    "I’m happy you’re feeling grateful.",
    "Grateful hearts are happy hearts."
  ],
  'lonely' => [
    "Feeling lonely can be hard, but you are important.",
    "You’re not truly alone — I’m here.",
    "Try reaching out to someone you trust.",
    "Loneliness can feel heavy, but it won’t last forever.",
    "You matter deeply to others.",
    "I’m here whenever you need to talk.",
    "Connections are closer than you think."
  ],
  'curious' => [
    "Curiosity is the beginning of knowledge!",
    "Ask away, I’m here to help.",
    "Exploring new ideas is exciting.",
    "Keep that curious mind active.",
    "Learning something new every day is wonderful.",
    "Your curiosity will take you far.",
    "I’m happy to explore topics with you."
  ],
  'relaxed' => [
    "It’s great to hear you’re relaxed.",
    "Enjoy the calm moments.",
    "Peaceful times help recharge your soul.",
    "Keep embracing that calmness.",
    "Relaxation is important for well-being.",
    "Take time to enjoy the stillness.",
    "Glad you’re feeling at peace."
  ],
  'default' => [
  "You're doing your best, and that’s enough.",
  "Every step forward counts—keep going!",
  "I'm here whenever you need a friend.",
  "Remember, it's okay to take things one moment at a time.",
  "Your feelings are valid, no matter what.",
  "Keep believing in yourself—you’ve got this!",
  "Sending you positive vibes and strength today."
  ]
]; 

$cleanInput = preg_replace('/[^\w\s]/', '', $input);
$words = explode(' ', $cleanInput);
$cleanedInput = implode(' ', $words); // Rebuilt clean string

$detectedMood = 'default';

foreach ($moodKeywords as $mood => $keywords) {
  foreach ($keywords as $keyword) {
    // Handle phrases or words correctly
    if (str_contains($keyword, ' ')) {
      // Check if whole phrase is in the cleaned input
      if (str_contains($cleanedInput, $keyword)) {
        $detectedMood = $mood;
        break 2;
      }
    } else {
      // Match exact word
      if (in_array($keyword, $words)) {
        $detectedMood = $mood;
        break 2;
      }
    }
  }
}

$replies = $replyBank[$detectedMood];
echo $replies[array_rand($replies)];
?>