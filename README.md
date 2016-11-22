# FindingMemo
# Muhamed Paric - 16940

## Stranica za cuvanje zabiljeski sa opcijom za arhiviranje i slanje podsjetnika

## Sta je uradjeno
- Login stranica
- Registracijska stranica
- Vecina glavne stranice
- Account stranica
- Najosnovnija validacija na login i register stranicama

## Sta nije uradjeno
- Stranica za arhivu
- Uljepsati account stranicu tako da izgleda slicno login i register stranicama
- Za 2. spiralu nista drugo

## Bugovi
- Horizontalni scrollbar na glavnoj stranici, overflow-x: hidden sakrije donji dio stranice (bezuspjesno sam pokusavao popraviti)
- Neki screenshoti mockupa su zuti, ne znam zasto, vjerovatno je kriv Linux-ov screenshot alat

## Opisi fajlova
- account.html - html kod za mijenjanje emaila i passworda
- login.html - html kod za loginovanje preko html forme
- register.html - html kod za registraciju preko html forme, linkove izmedju login i register stranica
- main.html - html kod glavnog dijela stranice na kojem ce korisnik vidjeti listu svojih memo-a, moci praviti nove, mijenjati, i arhivirati
- login_reg.css - css za login i register stranice jer su veoma slicne
- main_page.css - css za glavnu stranicu, gdje korisnik radi sa memo-ima
- account.css - (Za sada jos uvijek ruzan) css za account stranicu gdje korisnik mijenja email i password
- nav_bar.css - css za navigaciju koji ce postojati na glavnoj stranici, arhivi, i account stranici (takodjer sadrzi logout opciju)
