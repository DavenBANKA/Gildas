

from .forms import ContactForm
from .models import Projet
from .models import Portfolio

from django.contrib import messages
from django.shortcuts import redirect
from django.views.decorators.csrf import csrf_protect
from django.shortcuts import render

@csrf_protect
def contact_view(request):
    if request.method == "POST":
        name = request.POST.get("name")
        email = request.POST.get("email")
        message = request.POST.get("message")
        # Ici tu peux traiter le message (ex: envoi email)
        return render(request, 'contact.html', {"success": True})
    return render(request, 'contact.html')

def projects(request):
    projets = Portfolio.objects.all()
    return render(request, 'projects.html', {'projets': projets})

def contact(request):
    if request.method == 'POST':
        form = ContactForm(request.POST)
        if form.is_valid():
            # Gérer l’envoi mail ou sauvegarde
            messages.success(request, "Merci pour votre message, je vous répondrai rapidement.")
            return redirect('contact')
    else:
        form = ContactForm()
    return render(request, 'contact.html', {'form': form})

def projects(request):
    projets = Portfolio.objects.all()
    return render(request, 'projects.html', {'projets': projets})

def accueil(request):
    projets = Projet.objects.all().order_by('-date_creation')
    return render(request, 'portfolio/accueil.html', {'projets': projets})

def accueil(request):
    return render(request, 'portfolio/accueil.html')

def a_propos(request):
    return render(request, 'portfolio/a_propos.html')

def projets(request):
    return render(request, 'portfolio/projets.html')

def contact(request):
    return render(request, 'portfolio/contact.html')
