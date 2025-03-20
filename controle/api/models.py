from django.db import models

# Create your models here.
from django.db import models
from django.contrib.auth.models import AbstractUser

class CustomUser(AbstractUser):
    pass

class Gastos(models.Model):
    titulo = models.CharField( max_length=255, null=False, blank=False)
    valor = models.DecimalField(max_digits=8, decimal_places=2, null=False, blank=False)
    horario = models.TimeField(null=True, blank=True)
    dataGasto = models.DateField(null=True, blank=True)
    descricao = models.TextField(null=True, blank=True)
    usuario = models.ForeignKey(CustomUser, on_delete=models.CASCADE)

    def __str__(self):
        return self.nome
    
