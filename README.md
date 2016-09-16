# learningSF


**Stopień trudności:** średnio zaawansowany.    

**Cel Projektu:** Poszerzanie wiedzy z zakresu działania Symfony.

## Informacje
Jako iż większość osób sciąga symfony za pomocą ich instalatora:

```sh
   $ php symfony.phar new Blog 3.0
```
Ja postanowiłem, że moją przygodę z tym projektem zacznę od komendy:

```sh
  $ composer require symfony/symfony
```

Teoretycznie można powiedzieć, że to Symfony z MikroKernelem.

### Krok działań

- Stworzenie swojego MikroKernela
- Autoloader
- Podpięcie Bundli
- KOnfiguracja Routingu
- Kontrolery
- Serwisy
- Encje
- Doctrine

**Profit:** Szersze zrozumienie Symfony "od kuchni"

### Konfiguracja

1. Zerknij do pliku `composer.json` i zmień ścieżkę do vendor'a.
2. Zmień ścieżkę w `app/autoload.php`. 

Obecny zabieg przeniesienia `vendor` do innej lokalizacji niż sharing NFS w vagrancie sprawił, że 
ogromne opóźnienia zniknęły.
