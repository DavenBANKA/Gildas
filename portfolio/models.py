
from django.db import models

class Portfolio(models.Model):
    CATEGORY_CHOICES = [
        ('web', 'Web'),
        ('design', 'Design'),
        ('app', 'App'),
        ('autre', 'Autre'),
    ]

    title = models.CharField(max_length=100)
    description = models.TextField()
    image = models.ImageField(upload_to='portfolio/')
    category = models.CharField(max_length=20, choices=CATEGORY_CHOICES)
    link = models.URLField(blank=True)

    def __str__(self):
        return self.title

class Projet(models.Model):
    titre = models.CharField(max_length=100)
    description = models.TextField()
    date_creation = models.DateField(auto_now_add=True)
    lien = models.URLField(blank=True)

    def __str__(self):
        return self.titre
