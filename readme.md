Ugyanaz a feladat, mint a https://github.com/inf3rno/weblabor-forum-115535-strukturalt és a https://github.com/inf3rno/weblabor-forum-115535-tdd esetében, annyi a különbség, hogy most a TDD-s példában megírt keretrendszert használom fel kiindulási alapnak.

**Objektum orientált példa keretrendszerről kiindulva**

A feladat a példánál az, hogy csináljunk egy beléptető rendszert oo programozással.

A beléptető rendszer 3 oldalból fog állni: login, logout, profile.
A login csak jelszót kér be, amit magának küld el, és összehasonlítja az aktuálissal. Mivel csak egy jelszó lesz, ezért adatbázisra nincs szükség, elég egy json vagy xml fájlban letárolni.



**Flow** &#8730; &#10005;

Tegyük be a login oldalra, hogyha be vagyunk jelentkezve, akkor irányítson a profil oldalra.

&#8730; Csináljuk meg a profil oldalt.

    Megcsináltam a jelszó mentés részét, a munkamenet hiányzik már csak a képből.
    Kész a teljes profil oldal.

&#8730; Csináljuk meg a login oldalt.

    Megcsináltam a megjelenítés részét, logikát még egyáltalán nem raktam bele.

&#8730; Csináljunk egy Application könyvtárat, abban egy Container-t, és gondoljuk át, hogy mire lesz szükség az oldalhoz.

    Megcsináltam a bootstrap-et, csináltam egy main controller-t a jelenlegi oldalnak.
    A container-be az olyan dolgok fognak menni, amik közösek, és úgy jó, ha csak egy példány van belőlük:
        - munkamenet kezelés (csak egyszer szabad elindítani)
        - jelszó titkosítás (a salt fontos, hogy csak egy helyen legyen meg)
        - kapcsolat az adattárolóval
        - router
        - controllereket tároló container

&#8730; Kiindulásnak beállítottam a phpunit-ot, felszórtam a keretrendszert, és megcsináltam a front controller-t a htaccess-ben.