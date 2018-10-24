---
title: "Redovisningar"
---
Redovisningar.
=========================



Kmom01
-------------------------
- _Hur känns det att hoppa rakt in i objekt och klasser med PHP, gick det bra och kan du relatera till andra objektorienterade språk?_
- _Berätta hur det gick det att utföra uppgiften “Gissa numret” med GET, POST och SESSION?_
- _Har du några inledande reflektioner kring me-sidan och dess struktur?_
- _Vilken är din TIL för detta kmom?_

Det var inga konstigheter att hoppa rakt in i detta kursmoment. Objekt och klasser kändes väl igen sen tidigare då det jobbats ganska
mycket med det i JavaScript. Att ett objekt har metoder och properties kopplade till sig där metoderna är det som egentligen används
för att styra objektet känns självklart. När man skapar ett objekt gör man det oftast utifrån en klass där klassen är själva mallen
utav objektet och när man använder klassen för att skapa nytt objekt kallas det för att man gjort en instans av klassen. Det är precis
som man lärt sig tidigare bara att det istället för klass var mer fokus på att det kallades för konstruktor.

Att göra uppgiften "Gissa numret" gick bra var väl egentligen inga svårigheter att bygga upp klassen som skulle användas för uppgiften.
Att göra spelet med hjälp utav GET och POST kunde man så gott som göra med ögonen slutna. Det var SESSION delen som var det svåra för
mig att riktigt förstå då vi inte jobbat med det så mycket tidigare. Det svåra var egentligen vart man skulle instansiera klassen till
ett objekt. Man vill ju att det enbart ska ske en gång.

Jag valde att jag ville lägga det skapade objektet i SESSIONEN. Det gjordes genom att en koll utförs med hjälp utav PHP funktionen empty()
som kollar om en variabel är just empty. Första gången koden körs identifieras det att det inte finns något objekt i SESSION med en IF
sats, objektet instansieras och läggs därefter i SESSIONEN. Det innebär att nästa gång koden körs så är IF satsens villkor uppfyllt och
objektet instansieras inte om på nytt. Då får jag precis den funktionalitet jag eftersöker.

Känns som jag lyckades då sidan nu minns sina värden även om man startar den i en ny browser tab. Eftersom jag hade lite tid över stylades
sidan lite efter en ide om att göra en cirkulär inputfield.

Me-sidan känns bra och välbekant, så mycket som jag jobbat med "strukturen" i design kursen så vore det konstigt annars. Har pillat lite
och förstår hur man kan göra vissa saker men tar det lite lugnt så jag inte tar mig vatten över huvudet. Skapade en ljus, lätt design för
sidan vilken man kan styla mer framöver.

TIL för detta kursmoment är ?? Operatorer vilket jag inte kan minnas jag jobbat särskilt mycket med tidigare men förstår nu exakt vad man
använder det till.


Kmom02
-------------------------
- _Hur gick det att överföra spelet “Gissa mitt nummer” in i din me-sida?_
- _Berätta om din syn på modellering likt UML jämfört med verktyg som phpDocumentor. Fördelar, nackdelar, användningsområde? Vad tycker du om konceptet make doc?_
- _Hur känns det att skriva kod utanför och inuti ramverket, ser du fördelar och nackdelar med de olika sätten?_
- _Vilken är din TIL för detta kmom?_

Det gick väldigt bra att överföra spelet "Gissa mitt nummer" till me-sidan. Dels fick vi en riktigt bra genomgång från Mikael i hans
Youtube serier, och ytterligare repetition utav det i veckans föreläsning.

UML känns som ett riktigt bra verktyg när man ska modellera klasser samt klassers relationer. Allt blir väldigt tydligt och kan lätt
överskådas utav andra. phpDocumentor kräver verkligen att man får det till en vana att jobba med DocBlocks och det bör man då det blir
bra tydliga kommentarer i sin kod. Den genererade dokumentationen utav make doc blir väldigt tydlig och man får en bra översikt utav t.ex.
alla klasser som ingår i vilka namespaces. Fick tyvärr ganska mycket felmeddelanden i den genererade dokumentation vilket drog ner första
intrycket.

Jag tycker att det kändes bra med sättet hur vi först implementerade koden att fungera utanför ramverket. På det sättet kunde man lätt se
att allt funkar som det ska för att sen ta delar och flytta in i ramverket. Tror också det är bra nu i början att göra på ovan sätt, och
sen när man har mer kött på benen istället skriva koden direkt i ramverket.

Det viktiga jag tar med mig från denna veckas kursmoment är arbetet med namespaces och hur det med hjälp utav dem blir lättare att
organisera sina klasser.



Kmom03
-------------------------

Här är redovisningstexten



Kmom04
-------------------------

Här är redovisningstexten



Kmom05
-------------------------
- _Några reflektioner kring koden i övningen för PHP PDO och MySQL?_
- _Hur gick det att överföra koden in i ramverket, stötte du på några utmaningar?_
- _Berätta om din slutprodukt för filmdatabasen, gjorde du endast basfunktionaliteten eller lade du till extra features och hur tänkte du till kring användarvänligheten och din kodstruktur?_
- _Vilken är din TIL för detta kmom?_

Tycker mycket av det som handlade främst om PHP PDO och MySQL kändes igen. Fick gå tillbaka lite och insåg att vi pysslat lite med det i HTML/PHP kursen fast då med SQLite. Guiden var riktigt bra och informationsrik och det var inga problem att utföra det som stod. Att överföra koden som skapades i guiden gick bra känns som det börjar bli ganska lätt att skapa routes och vyer nu. Det svåra är att minska koden i routsen men förstår att man ska bryta ut mer i funktioner.

Jag började med att strukturera filmdatabasen med en "edit" och "delete" knapp i varsin kolumn i filmtabellen samt lade jag till en länk i menyn för att lägga till filmer, med tanken på att det skulle bli ett lättare och en smartare lösning. Men problem uppstod då främst med att "edit" och "add" inte kunde använda samma form därför återgick jag till guidens lösning som egentligen är mycket mer dry och smartare.

Gjorde egentligen inga extra features förutom att implementera cimage för bilderna. Där använder jag substr för bilderna för att helt enkelt ta bort bildernas sökväg i databasen. Är väl inte den bästa lösningen egentligen, men det gick bra snabbt att göra istället för att ändra alla värden i databasen.

Det jag tar med mig från detta kursmoment är nog hur man i ramverket ansluter sig med hjälp utav PHP PDO till databasen både lokalt och på studentservern.


Kmom06
-------------------------

Här är redovisningstexten



Kmom07-10
-------------------------

Här är redovisningstexten
