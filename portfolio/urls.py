from django.urls import path
from . import views
from .views import contact_view

urlpatterns = [
    path('', views.accueil, name='accueil'),
    path('about/', views.a_propos, name='a_propos'),
    path('projects/', views.projets, name='projets'),
    path('contact/', views.contact, name='contact'),
    path('contact/', contact_view, name='contact'),  # ← Ici le nom
]
