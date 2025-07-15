# **📰 RafPress**

**RafPress** to prosty system blogowy zbudowany w oparciu o **Laravel**, **MySQL** oraz **Filament PHP**. Projekt posiada panel administracyjny z możliwością zarządzania treściami, użytkownikami, kategoriami i tagami, oraz systemem wysyłki powiadomień e-mail przy publikacji postów.

![Widok posta](./public/main.png)

## **🔧 Stack technologiczny**
-   **Backend**: Laravel 12
-   **Baza danych**: MySQL
-   **Panel administracyjny**: Filament PHP v3
-   **Wysyłka e-maili**: Laravel Mail

## **✨ Aktualne funkcje**
-   **CRUD postów** z obsługą:
    -   zdjęcia głównego,
    -   treści w rich text editor (TipTap),
    -   tagów (many-to-many),
    -   kategorii,
    -   autora,
    -   statusu (draft, published, archived),
    -   soft deletes (możliwość przywracania usuniętych postów),
    -   komentarzy z systemem zatwierdzania,
    -   polubień (posty i komentarze)
-   **System uprawnień** oparty na rolach (Admin, Editor, Reader)
-   **Panel administracyjny Filament** z:
    -   przyciskiem Publish dostępnym z widoku posta,
    -   reaktywnymi akcjami (approve comment),
    -   intuicyjnym layoutem (edytor po lewej, ustawienia po prawej),
    -   filtrami dla usuniętych postów (Trashed Filter),
    -   eksportem postów do CSV/Excel (Laravel Excel),
    -   widgets i statystyki na dashboardzie
-   **System powiadomień email**:
    -   automatyczna wysyłka przy publikacji posta,
    -   powiadomienia o nowych komentarzach,
    -   kolejkowanie maili w tle (Laravel Queue),
    -   szablony markdown
-   **API endpoints** z autentykacją Laravel Sanctum:
    -   rejestracja i logowanie użytkowników,
    -   weryfikacja email,
    -   tworzenie komentarzy,
    -   rate limiting dla bezpieczeństwa
-   **Observer Pattern** dla automatyzacji (PostObserver, CommentObserver)
-   **Policy classes** dla autoryzacji każdego modelu


## **🔌 Plany rozwoju**
-   **Dokończenie API REST**:
    -   system polubień przez API,
    -   wystawienie kategorii i tagów
    -   dokumentacja API z przykładami
-   **Infrastruktura projektu**:
    -   przygotowanie szczegółowych instrukcji instalacji,
    -   testy jednostkowe i funkcjonalne (PHPUnit),
    -   CI/CD pipeline,
    -   monitoring i logging
