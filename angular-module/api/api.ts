export * from './animal.service';
import { AnimalService } from './animal.service';
export * from './breed.service';
import { BreedService } from './breed.service';
export * from './owner.service';
import { OwnerService } from './owner.service';
export * from './species.service';
import { SpeciesService } from './species.service';
export const APIS = [AnimalService, BreedService, OwnerService, SpeciesService];
