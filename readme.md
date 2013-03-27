Ugyanaz a feladat, mint a https://github.com/inf3rno/weblabor-forum-115535-strukturalt és a https://github.com/inf3rno/weblabor-forum-115535-tdd esetében, annyi a különbség, hogy most a TDD-s példában megírt keretrendszert használom fel kiindulási alapnak.

**Objektum orientált példa keretrendszerről kiindulva**

A feladat a példánál az, hogy csináljunk egy beléptető rendszert oo programozással.

A beléptető rendszer 3 oldalból fog állni: login, logout, profile.
A login csak jelszót kér be, amit magának küld el, és összehasonlítja az aktuálissal. Mivel csak egy jelszó lesz, ezért adatbázisra nincs szükség, elég egy json vagy xml fájlban letárolni.



**Flow** &#8730; &#10005;

Csináljunk egy Application könyvtárat, abban egy Container-t, és gondoljuk át, hogy mire lesz szükség az oldalhoz.

&#8730; Kiindulásnak beállítottam a phpunit-ot, felszórtam a keretrendszert, és megcsináltam a front controller-t a htaccess-ben.